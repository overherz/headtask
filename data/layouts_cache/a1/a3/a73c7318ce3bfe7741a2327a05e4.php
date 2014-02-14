<?php

/* applications\projects\layouts\files/upload_form.html */
class __TwigTemplate_a1a3a73c7318ce3bfe7741a2327a05e4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo \layout::func_from_text("<div style=\"width: 770px;\">
    <span class=\"btn btn-success fileinput-button\">
        <i class=\"icon-plus icon-white\"></i>
        <span>Выберите файлы или перетащите их на кнопку</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id=\"fileupload\" type=\"file\" name=\"files[]\" multiple>
    </span>
    <table class=\"table table-condensed table-bordered table_upload table-striped\" style=\"background: transparent;display: none;\">
        <tr>
            <th style=\"border-top: none;width: 1%;white-space: nowrap;\">Все</th>
            <th style=\"border-top: none;\" colspan=\"2\">
                <div class=\"progress progress-striped active\">
                    <div class=\"bar bar_upload\" style=\"width: 0%;\"></div>
                </div>
            </th>
        </tr>
    </table>
</div>");
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\files/upload_form.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
