<?php

/* /applications/projects/layouts/project_menu.html */
class __TwigTemplate_32b158ae261743a53ae52c8907a2960b extends Twig_Template
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
        <a class=\"btn btn-purple ");
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
                echo \layout::func_from_text("<a class=\"btn btn-purple btn-gold ");
                if ((isset($context["add_news_button"]) ? $context["add_news_button"] : null)) {
                    echo \layout::func_from_text("active");
                }
                echo \layout::func_from_text("\" href=\"/projects/news/add/");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("/\"><i class=\"icon-plus icon-white\"></i></a>");
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
        echo \layout::func_from_text("/\"><i class=\"icon icon-bar-chart\"></i></a>
        ");
        // line 15
        if (($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_task") || $this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_error"))) {
            echo \layout::func_from_text("<a class=\"btn btn-success ");
            if ((isset($context["add_tasks_button"]) ? $context["add_tasks_button"] : null)) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\" href=\"/projects/tasks/add/");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\"><i class=\"icon-plus icon-white\"></i></a>");
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
            echo \layout::func_from_text("<a class=\"btn btn-info upload_files\" href=\"\"><i class=\"icon-plus icon-white\"></i></a>");
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
                echo \layout::func_from_text("/\"><i class=\"icon-plus icon-white\"></i></a>");
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
            echo \layout::func_from_text("/\"><i class=\"icon-plus icon-white\"></i></a>");
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
                echo \layout::func_from_text("/\"><i class=\"icon-plus icon-white\"></i></a>");
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
            echo \layout::func_from_text("/\"><i class=\"icon-pencil icon-white\"></i></a>");
        }
        // line 40
        echo \layout::func_from_text("        ");
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "delete_project")) {
            echo \layout::func_from_text("<a class=\"btn btn-danger delete_project\" href=\"\" project_id=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\" data-name=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("\"><i class=\"icon-trash icon-white\"></i></a>");
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
        return array (  211 => 41,  202 => 40,  192 => 39,  189 => 38,  182 => 35,  172 => 34,  164 => 33,  161 => 32,  156 => 30,  146 => 29,  135 => 27,  131 => 25,  113 => 23,  108 => 21,  105 => 20,  101 => 19,  93 => 18,  89 => 16,  56 => 10,  46 => 9,  65 => 7,  24 => 3,  22 => 2,  80 => 13,  92 => 20,  66 => 13,  60 => 12,  58 => 10,  55 => 9,  52 => 8,  48 => 6,  42 => 5,  25 => 4,  21 => 2,  79 => 15,  76 => 11,  57 => 6,  35 => 7,  23 => 3,  19 => 1,  148 => 49,  139 => 50,  137 => 49,  130 => 44,  127 => 43,  121 => 24,  110 => 22,  102 => 33,  100 => 32,  91 => 25,  88 => 24,  82 => 9,  71 => 14,  61 => 13,  44 => 6,  34 => 3,  77 => 16,  74 => 15,  69 => 9,  43 => 8,  40 => 7,  33 => 6,  30 => 5,  242 => 86,  238 => 84,  234 => 82,  230 => 80,  220 => 78,  216 => 77,  213 => 76,  209 => 75,  206 => 74,  204 => 73,  201 => 72,  199 => 71,  195 => 69,  186 => 65,  180 => 64,  174 => 63,  169 => 60,  167 => 59,  159 => 31,  154 => 53,  145 => 49,  140 => 46,  138 => 28,  134 => 43,  125 => 42,  120 => 39,  111 => 35,  106 => 21,  104 => 31,  96 => 28,  90 => 27,  84 => 18,  78 => 25,  72 => 23,  63 => 13,  59 => 16,  54 => 10,  51 => 9,  45 => 6,  41 => 5,  38 => 8,  31 => 2,  28 => 4,);
    }
}
