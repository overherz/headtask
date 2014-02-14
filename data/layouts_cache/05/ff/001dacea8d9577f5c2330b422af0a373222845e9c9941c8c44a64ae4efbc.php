<?php

/* applications\index\layouts\admin/change_pass.html */
class __TwigTemplate_05ff001dacea8d9577f5c2330b422af0a373222845e9c9941c8c44a64ae4efbc extends Twig_Template
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
        echo \layout::func_from_text("<form class=\"change_password_index\">
    <input type=\"hidden\" name=\"act\" value=\"save_password\">
    <div class=\"body\"><span class=\"title\">Пароль:<span>
        <div><input type=\"text\" name=\"password\" class=\"input\" style=\"width:350px;\"></div></div>
    <div class=\"body\"><span class=\"title\">Повторите пароль:<span>
        <div><input type=\"text\" name=\"password_repeat\" class=\"input\" style=\"width:350px;\"></div></div>
</form>
");
    }

    public function getTemplateName()
    {
        return "applications\\index\\layouts\\admin/change_pass.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
