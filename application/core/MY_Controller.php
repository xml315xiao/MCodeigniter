<?php

class MY_Controller extends CI_Controller
{
    protected $model_file   = NULL;
    protected $library_file = NULL;
    protected $helper_file  = NULL;

    protected $use_view   = '';
    protected $vars       = [];

    public function __construct()
    {
        parent::__construct();

        if (!is_null($this->model_file)) {
            $this->load->model($this->model_file);
        }

        if (!is_null($this->library_file)) {
            $this->load->library($this->library_file);
        }

        if (!is_null($this->helper_file)) {
            $this->load->helper($this->helper_file);
        }

        if ($this->config->item('show_profiler') === true) {
            $this->output->enable_profiler(true);
        }
    }

    protected function set_var($name, $value = null)
    {
        if (is_array($name)) {
            foreach ($name as $k=>$v) {
                $this->vars[$k] = $v;
            }
        } else {
            $this->vars[$name] = $value;
        }
    }

    protected function view($view)
    {
        $this->use_view = $view;

        return $this;
    }

    protected function render($data = [])
    {
        $view = !empty($this->use_view) ? $this->use_view : $this->router->fetch_class(). '/'. $this->router->fetch_method();

        $data = array_merge($data, $this->vars);

        $this->load->view($view, $data);
    }

    protected function render_text()
    {
        $this->output->enable_profiler(false)
            ->set_content_type('text/plain');
    }

    protected function render_json($json)
    {
        if (is_resource($json)) {
            throw new ErrorException('资源类型不能转换成JSON格式');
        }

        $this->output->enable_profiler(false)
            ->set_content_type('application/json')
            ->set_output(json_encode($json));
    }

    protected function get_json($format = 'object', $depth = 512)
    {
        $as_array = $format == 'array' ? true : false;

        return json_decode( file_get_contents('php://input'), $as_array, $depth );
    }
}
