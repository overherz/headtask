<?php

/* applications/projects/layouts/files/upload_form.html */
class __TwigTemplate_a38dce67c808d89c5d78c99237c10cd182d28e0b83fcd624747fe812759b0b51 extends Twig_Template
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
    <div class=\"fileinput-button\">
        <input id=\"fileupload\" type=\"file\" name=\"files[]\" multiple>
    </div>
    <table class=\"table table-condensed table_upload table-striped\" style=\"background: transparent;display: none;\">
        <tr>
            <th style=\"border-top: none;width: 1%;white-space: nowrap;\">Все</th>
            <th style=\"border-top: none;\" colspan=\"2\">
                <div class=\"progress progress-striped active\">
                    <div class=\"progress-bar bar_upload\" style=\"width: 0%;\"></div>
                </div>
            </th>
        </tr>
    </table>
</div>");
    }

    public function getTemplateName()
    {
        return "applications/projects/layouts/files/upload_form.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
