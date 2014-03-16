<?php

/* applications\projects\layouts\news/add_news.html */
class __TwigTemplate_fbd0264e7ab58e3c357ec801364868a75536eb18ab6b562bbbc22e12733112fb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'js' => array($this, 'block_js'),
            'project_data' => array($this, 'block_project_data'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "project.html"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        if ((isset($context["news"]) ? $context["news"] : null)) {
            echo \layout::func_from_text("Редактирование новости");
        } else {
            echo \layout::func_from_text("Добавление новости");
        }
    }

    // line 7
    public function block_js($context, array $blocks = array())
    {
        // line 8
        $this->displayParentBlock("js", $context, $blocks);
        echo \layout::func_from_text("
<script type =\"text/javascript\" src=\"/source/js/ckeditor/ckeditor.js\"></script>

<script src=\"");
        // line 11
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
");
    }

    // line 14
    public function block_project_data($context, array $blocks = array())
    {
        // line 15
        echo \layout::func_from_text("<form id=\"news_form\" class=\"form-horizontal\">
    <input type=\"hidden\" name=\"act\" value=\"save_news\">
    ");
        // line 17
        if ($this->getAttribute((isset($context["news"]) ? $context["news"] : null), "id")) {
            echo \layout::func_from_text("<input type=\"hidden\" name=\"id\" value=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["news"]) ? $context["news"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\">");
        }
        // line 18
        echo \layout::func_from_text("
    <div class=\"form-group\">
        <label class=\"col-lg-2 control-label\" for=\"name\">Название</label>
        <div class=\"col-lg-10\">
            <input type=\"text\" name=\"name\" id=\"name\" class=\"form-control\" value=\"");
        // line 22
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["news"]) ? $context["news"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("\">
        </div>
    </div>
    <div class=\"form-group\">
        <label class=\"col-lg-2 control-label\" for=\"description\">Текст новости</label>
        <div class=\"col-lg-10\">
            <div class=\"wysiwyg\"><textarea rows=\"5\" class=\"form-control\" name=\"description\" id=\"description\">");
        // line 28
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["news"]) ? $context["news"] : null), "description"), "html", null, true));
        echo \layout::func_from_text("</textarea></div>
        </div>
    </div>
    ");
        // line 31
        if ((isset($context["users"]) ? $context["users"] : null)) {
            // line 32
            echo \layout::func_from_text("    <div class=\"form-group\">
        <label class=\"col-lg-2 control-label\" for=\"notifications\">Уведомления</label>
        <div class=\"col-lg-10\">
            <table class=\"table table-bordered table-condensed\" style=\"width: auto;\">
                <tr>
                    <th>Имя</th>
                    <th style=\"white-space: nowrap;\">Email <input type=\"checkbox\" id=\"checkbox_email\"></th>
                    ");
            // line 39
            if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "send_sms"), "value") == 1)) {
                // line 40
                echo \layout::func_from_text("                        <th style=\"white-space: nowrap;\">Sms <input type=\"checkbox\" id=\"checkbox_sms\"></th>
                    ");
            }
            // line 42
            echo \layout::func_from_text("                </tr>
                ");
            // line 43
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["u"]) {
                // line 44
                echo \layout::func_from_text("                <tr>
                    <td style=\"white-space: nowrap;\">");
                // line 45
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "fio"), "html", null, true));
                echo \layout::func_from_text(" ");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "nickname"), "html", null, true));
                echo \layout::func_from_text("</td>
                    <td style=\"text-align: right;\"><input type=\"checkbox\" class=\"checkbox_email\" name=\"email[]\" value=\"");
                // line 46
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), "html", null, true));
                echo \layout::func_from_text("\"></td>
                    ");
                // line 47
                if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "send_sms"), "value") == 1)) {
                    // line 48
                    echo \layout::func_from_text("                        <td style=\"text-align: right;\"><input type=\"checkbox\" class=\"checkbox_sms\" name=\"sms[]\" value=\"");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), "html", null, true));
                    echo \layout::func_from_text("\"></td>
                    ");
                }
                // line 50
                echo \layout::func_from_text("                </tr>
                ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['u'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 52
            echo \layout::func_from_text("            </table>
        </div>
    </div>
    ");
        }
        // line 56
        echo \layout::func_from_text("    <div style=\"text-align: center;margin-top: 10px;\">
        <button class=\"btn btn-large btn-primary save_news\" type=\"button\">");
        // line 57
        if ($this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id")) {
            echo \layout::func_from_text("Сохранить");
        } else {
            echo \layout::func_from_text("Создать");
        }
        echo \layout::func_from_text("</button>
    </div>
</form>
<div class=\"clearfix\"></div>
");
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\news/add_news.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  149 => 57,  146 => 56,  140 => 52,  133 => 50,  127 => 48,  125 => 47,  121 => 46,  115 => 45,  112 => 44,  108 => 43,  105 => 42,  101 => 40,  99 => 39,  90 => 32,  88 => 31,  82 => 28,  73 => 22,  67 => 18,  61 => 17,  57 => 15,  54 => 14,  48 => 11,  42 => 8,  39 => 7,  31 => 4,  28 => 3,);
    }
}
