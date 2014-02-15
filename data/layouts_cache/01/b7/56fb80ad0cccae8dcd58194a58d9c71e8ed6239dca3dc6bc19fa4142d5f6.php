<?php

/* /applications/projects/layouts/project_menu.html */
class __TwigTemplate_01b756fb80ad0cccae8dcd58194a58d9c71e8ed6239dca3dc6bc19fa4142d5f6 extends Twig_Template
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
        echo \layout::func_from_text("<div class=\"btn-block\" style=\"margin-bottom: 20px;\">
    <div class=\"btn-group\">
        <a class=\"btn btn-india ");
        // line 3
        if ((isset($context["review_button"]) ? $context["review_button"] : null)) {
            echo \layout::func_from_text("active");
        }
        echo \layout::func_from_text("\" href=\"/projects/~");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("/\">Обзор</a>
    </div>

    ");
        // line 6
        if ((!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "owner"))) {
            // line 7
            echo \layout::func_from_text("    <div class=\"btn-group\">
        <a class=\"btn btn-black ");
            // line 8
            if ((isset($context["news_button"]) ? $context["news_button"] : null)) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\" href=\"/projects/news/");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\">Новости</a>
        ");
            // line 9
            if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "news")) {
                echo \layout::func_from_text("<a class=\"btn btn-black ");
                if ((isset($context["add_news_button"]) ? $context["add_news_button"] : null)) {
                    echo \layout::func_from_text("active");
                }
                echo \layout::func_from_text("\" href=\"/projects/news/add/");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("/\"><i class=\"fa fa-plus\"></i></a>");
            }
            // line 10
            echo \layout::func_from_text("    </div>
    ");
        }
        // line 12
        echo \layout::func_from_text("    <div class=\"btn-group\">
        <a class=\"btn btn-success ");
        // line 13
        if ((isset($context["tasks_button"]) ? $context["tasks_button"] : null)) {
            echo \layout::func_from_text("active");
        }
        echo \layout::func_from_text("\" href=\"/projects/tasks/");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("/\">Задачи</a>
        <a class=\"btn btn-success ");
        // line 14
        if ((isset($context["gantt_button"]) ? $context["gantt_button"] : null)) {
            echo \layout::func_from_text("active");
        }
        echo \layout::func_from_text("\" href=\"/projects/gantt/");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("/\"><i class=\"fa fa-bar-chart-o\"></i></a>
        ");
        // line 15
        if (($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_task") || $this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_error"))) {
            echo \layout::func_from_text("<a class=\"btn btn-success ");
            if ((isset($context["add_tasks_button"]) ? $context["add_tasks_button"] : null)) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\" href=\"/projects/tasks/add/");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\"><i class=\"fa fa-plus\"></i></a>");
        }
        // line 16
        echo \layout::func_from_text("    </div>
    <div class=\"btn-group\">
        <a href=\"/projects/files/");
        // line 18
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\" class=\"btn btn-info ");
        if ((isset($context["files_button"]) ? $context["files_button"] : null)) {
            echo \layout::func_from_text("active");
        }
        echo \layout::func_from_text("\">Файлы</a>
        ");
        // line 19
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_files")) {
            echo \layout::func_from_text("<a class=\"btn btn-info upload_files\" href=\"\"><i class=\"fa fa-plus\"></i></a>");
        }
        // line 20
        echo \layout::func_from_text("    </div>
    ");
        // line 21
        if ((!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "owner"))) {
            // line 22
            echo \layout::func_from_text("    <div class=\"btn-group\">
        <a href=\"/projects/users/");
            // line 23
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\" class=\"btn btn-primary ");
            if ((isset($context["users_button"]) ? $context["users_button"] : null)) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\">Участники</a>
        ");
            // line 24
            if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "users")) {
                echo \layout::func_from_text("<a class=\"btn btn-primary ");
                if ((isset($context["add_users_button"]) ? $context["add_users_button"] : null)) {
                    echo \layout::func_from_text("active");
                }
                echo \layout::func_from_text("\" href=\"/projects/users/add/");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("/\"><i class=\"fa fa-plus\"></i></a>");
            }
            // line 25
            echo \layout::func_from_text("    </div>
    ");
        }
        // line 27
        echo \layout::func_from_text("    <div class=\"btn-group\">
        <a class=\"btn btn-foxtrot ");
        // line 28
        if ((isset($context["documents_button"]) ? $context["documents_button"] : null)) {
            echo \layout::func_from_text("active");
        }
        echo \layout::func_from_text("\" href=\"/projects/documents/");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("/\">Wiki</a>
        ");
        // line 29
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "documents")) {
            echo \layout::func_from_text("<a class=\"btn btn-foxtrot ");
            if ((isset($context["add_documents_button"]) ? $context["add_documents_button"] : null)) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\" href=\"/projects/documents/add/");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\"><i class=\"fa fa-plus\"></i></a>");
        }
        // line 30
        echo \layout::func_from_text("    </div>
    ");
        // line 31
        if ((!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "owner"))) {
            // line 32
            echo \layout::func_from_text("    <div class=\"btn-group\">
        <a class=\"btn btn-oscar ");
            // line 33
            if ((isset($context["forum_button"]) ? $context["forum_button"] : null)) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\" href=\"/projects/forum/");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\">Форум</a>
        ");
            // line 34
            if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "forum")) {
                echo \layout::func_from_text("<a class=\"btn btn-oscar ");
                if ((isset($context["add_forum_button"]) ? $context["add_forum_button"] : null)) {
                    echo \layout::func_from_text("active");
                }
                echo \layout::func_from_text("\" href=\"/projects/forum/add/");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("/\"><i class=\"fa fa-plus\"></i></a>");
            }
            // line 35
            echo \layout::func_from_text("        <!--<div class=\"nickname\" style=\"font-size: 12px;position: absolute;margin-top: -6px;\">Новые: ");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "count_new_posts"), "html", null, true));
            echo \layout::func_from_text("</div>-->
    </div>
    ");
        }
        // line 38
        echo \layout::func_from_text("    <div class=\"btn-group\">
        ");
        // line 39
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "edit_project")) {
            echo \layout::func_from_text("<a class=\"btn btn-danger ");
            if ((isset($context["edit_button"]) ? $context["edit_button"] : null)) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\" href=\"/projects/edit/");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\"><i class=\"fa fa-pencil\"></i></a>");
        }
        // line 40
        echo \layout::func_from_text("        ");
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "delete_project")) {
            echo \layout::func_from_text("<a class=\"btn btn-danger delete_project\" href=\"\" project_id=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\" data-name=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("\"><i class=\"fa fa-trash-o\"></i></a>");
        }
        // line 41
        echo \layout::func_from_text("    </div>
</div>");
    }

    public function getTemplateName()
    {
        return "/applications/projects/layouts/project_menu.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  211 => 41,  202 => 40,  192 => 39,  189 => 38,  182 => 35,  172 => 34,  164 => 33,  161 => 32,  159 => 31,  156 => 30,  146 => 29,  138 => 28,  135 => 27,  131 => 25,  121 => 24,  113 => 23,  110 => 22,  108 => 21,  105 => 20,  101 => 19,  93 => 18,  89 => 16,  79 => 15,  71 => 14,  63 => 13,  60 => 12,  56 => 10,  46 => 9,  38 => 8,  35 => 7,  33 => 6,  23 => 3,  19 => 1,);
    }
}
