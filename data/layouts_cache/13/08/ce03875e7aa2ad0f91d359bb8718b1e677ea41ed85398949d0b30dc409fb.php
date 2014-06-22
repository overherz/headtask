<?php

/* applications\projects\layouts\add.html */
class __TwigTemplate_1308ce03875e7aa2ad0f91d359bb8718b1e677ea41ed85398949d0b30dc409fb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'js' => array($this, 'block_js'),
            'project' => array($this, 'block_project'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "index.html"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo \layout::func_from_text("    ");
        if ((isset($context["project"]) ? $context["project"] : null)) {
            echo \layout::func_from_text("Редактирование проекта");
        } else {
            echo \layout::func_from_text("Создание проекта");
        }
    }

    // line 7
    public function block_css($context, array $blocks = array())
    {
        // line 8
        echo \layout::func_from_text("    ");
        $this->displayParentBlock("css", $context, $blocks);
        echo \layout::func_from_text("
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/source/js/miniColors/jquery.miniColors.css\">
");
    }

    // line 11
    public function block_js($context, array $blocks = array())
    {
        // line 12
        echo \layout::func_from_text("    <script type=\"text/javascript\" src=\"/source/js/miniColors/jquery.miniColors.min.js\"></script>
    ");
        // line 13
        $this->displayParentBlock("js", $context, $blocks);
        echo \layout::func_from_text("
");
    }

    // line 16
    public function block_project($context, array $blocks = array())
    {
        // line 17
        echo \layout::func_from_text("    ");
        if ($this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id")) {
            // line 18
            echo \layout::func_from_text("        ");
            $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "project_menu.html"), "method"));
            $template->display($context);
            // line 19
            echo \layout::func_from_text("
    <ul class=\"nav nav-tabs\" id=\"form_tabs\">
        <li class=\"active\"><a href=\"#tabs-1\">Описание</a></li>
        <li><a href=\"#tabs-2\">Категории</a></li>
    </ul>

    <div class=\"tab-content\">
        <div id=\"tabs-1\" class=\"tab-pane fade in active\">
    ");
        }
        // line 28
        echo \layout::func_from_text("            <form id=\"project_form\" class=\"form-horizontal\">
                <input type=\"hidden\" name=\"act\" value=\"save_project\">
                ");
        // line 30
        if ($this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id")) {
            echo \layout::func_from_text("<input type=\"hidden\" name=\"id\" value=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\">");
        }
        // line 31
        echo \layout::func_from_text("                <div class=\"form-group\">
                    <label class=\"col-lg-2 control-label\" for=\"name\">Название проекта</label>
                    <div class=\"col-lg-10\">
                        <input type=\"text\" name=\"name\" id=\"name\" class=\"form-control\" value=\"");
        // line 34
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("\">
                    </div>
                </div>
                <div class=\"form-group\">
                    <label class=\"col-lg-2 control-label\" for=\"description\">Описание проекта</label>
                    <div class=\"col-lg-10\">
                        <textarea rows=\"5\" class=\"form-control\" name=\"description\" id=\"description\">");
        // line 40
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "description"), "html", null, true));
        echo \layout::func_from_text("</textarea>
                    </div>
                </div>
                <div class=\"form-group\">
                    <label class=\"col-lg-2 control-label\" for=\"url\">Ссылка</label>
                    <div class=\"col-lg-10\">
                        <input type=\"text\" class=\"form-control\" name=\"url\" id=\"url\" value=\"");
        // line 46
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "url"), "html", null, true));
        echo \layout::func_from_text("\">
                    </div>
                </div>
                <div class=\"form-group\">
                    <label class=\"col-lg-2 control-label\" for=\"archive\">Архивный</label>
                    <div class=\"col-lg-10 checkbox\">
                        <input type=\"checkbox\" name=\"archive\" id=\"archive\" value=\"1\" ");
        // line 52
        if ($this->getAttribute((isset($context["project"]) ? $context["project"] : null), "archive")) {
            echo \layout::func_from_text("checked");
        }
        echo \layout::func_from_text(" />
                    </div>
                </div>
                ");
        // line 55
        if (((!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id")) && $this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_project"))) {
            // line 56
            echo \layout::func_from_text("                    <div class=\"form-group\">
                        <label class=\"col-lg-2 control-label\" for=\"owner\">Личный</label>
                        <div class=\"col-lg-10 checkbox\">
                            <input type=\"checkbox\" name=\"owner\" id=\"owner\" value=\"1\" />
                        </div>
                    </div>
                ");
        }
        // line 63
        echo \layout::func_from_text("                <div class=\"form-group\">
                    <div class=\"col-lg-10 col-lg-offset-2\">
                        <button class=\"btn btn-primary save_project\" type=\"button\">");
        // line 65
        if ($this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id")) {
            echo \layout::func_from_text("Сохранить");
        } else {
            echo \layout::func_from_text("Создать");
        }
        echo \layout::func_from_text("</button>
                    </div>
                </div>
            </form>
    ");
        // line 69
        if ($this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id")) {
            echo \layout::func_from_text("</div>");
        }
        // line 70
        echo \layout::func_from_text("
");
        // line 71
        if ((isset($context["project"]) ? $context["project"] : null)) {
            // line 72
            echo \layout::func_from_text("        <div id=\"tabs-2\" class=\"tab-pane\">
            <div style=\"text-align: right;\">
                <a class=\"btn btn-success btn-sm\" id=\"add_category\" data-project_id=\"");
            // line 74
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\">Добавить категорию</a>
            </div>
        <div id=\"category_div\">
            ");
            // line 77
            $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "category_table.html"), "method"));
            $template->display($context);
            // line 78
            echo \layout::func_from_text("        </div>
         </div>
");
        }
        // line 81
        echo \layout::func_from_text("    ");
        if ($this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id")) {
            echo \layout::func_from_text("</div>");
        }
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\add.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  188 => 81,  183 => 78,  180 => 77,  174 => 74,  170 => 72,  168 => 71,  165 => 70,  161 => 69,  150 => 65,  146 => 63,  137 => 56,  135 => 55,  127 => 52,  118 => 46,  109 => 40,  100 => 34,  95 => 31,  89 => 30,  85 => 28,  74 => 19,  70 => 18,  67 => 17,  64 => 16,  58 => 13,  55 => 12,  52 => 11,  44 => 8,  41 => 7,  32 => 4,  29 => 3,);
    }
}
