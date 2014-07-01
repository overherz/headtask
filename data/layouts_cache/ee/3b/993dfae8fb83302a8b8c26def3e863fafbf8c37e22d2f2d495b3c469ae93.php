<?php

/* /applications/projects/layouts/project_menu.html */
class __TwigTemplate_ee3b993dfae8fb83302a8b8c26def3e863fafbf8c37e22d2f2d495b3c469ae93 extends Twig_Template
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
        echo \layout::func_from_text("/\"><i class=\"fa fa-info menu_icon\"></i><span class=\"menu_text\">Обзор</span></a>
    </div>
    ");
        // line 5
        if ((!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "owner"))) {
            // line 6
            echo \layout::func_from_text("    <div class=\"btn-group\">
        <a class=\"btn btn-black ");
            // line 7
            if ((isset($context["news_button"]) ? $context["news_button"] : null)) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\" href=\"/projects/news/");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\"><i class=\"fa fa-rss menu_icon\"></i><span class=\"menu_text\">Новости</span></a>
        ");
            // line 8
            if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "news")) {
                echo \layout::func_from_text("<a class=\"btn btn-black ");
                if ((isset($context["add_news_button"]) ? $context["add_news_button"] : null)) {
                    echo \layout::func_from_text("active");
                }
                echo \layout::func_from_text("\" href=\"/projects/news/add/");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("/\"><i class=\"fa fa-plus\"></i></a>");
            }
            // line 9
            echo \layout::func_from_text("    </div>
    ");
        }
        // line 11
        echo \layout::func_from_text("    <div class=\"btn-group\">
        <a class=\"btn btn-success ");
        // line 12
        if ((isset($context["tasks_button"]) ? $context["tasks_button"] : null)) {
            echo \layout::func_from_text("active");
        }
        echo \layout::func_from_text("\" href=\"/projects/tasks/");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("/\"><i class=\"fa fa-tasks menu_icon\"></i><span class=\"menu_text\">Задачи</span></a>
        <a class=\"btn btn-success ");
        // line 13
        if ((isset($context["gantt_button"]) ? $context["gantt_button"] : null)) {
            echo \layout::func_from_text("active");
        }
        echo \layout::func_from_text("\" href=\"/projects/gantt/");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("/\"><i class=\"fa fa-bar-chart-o\"></i></a>
        ");
        // line 14
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_task")) {
            echo \layout::func_from_text("<a class=\"btn btn-success ");
            if ((isset($context["add_tasks_button"]) ? $context["add_tasks_button"] : null)) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\" href=\"/projects/tasks/add/");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\"><i class=\"fa fa-plus\"></i></a>");
        }
        // line 15
        echo \layout::func_from_text("    </div>
    <div class=\"btn-group\">
        <a href=\"/projects/files/");
        // line 17
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\" class=\"btn btn-info ");
        if ((isset($context["files_button"]) ? $context["files_button"] : null)) {
            echo \layout::func_from_text("active");
        }
        echo \layout::func_from_text("\"><i class=\"fa fa-files-o menu_icon\"></i><span class=\"menu_text\">Файлы</span></a>
        ");
        // line 18
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_files")) {
            echo \layout::func_from_text("<a class=\"btn btn-info upload_files\" href=\"\"><i class=\"fa fa-plus\"></i></a>");
        }
        // line 19
        echo \layout::func_from_text("    </div>
    ");
        // line 20
        if ((!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "owner"))) {
            // line 21
            echo \layout::func_from_text("    <div class=\"btn-group\">
        <a href=\"/projects/users/");
            // line 22
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\" class=\"btn btn-primary ");
            if ((isset($context["users_button"]) ? $context["users_button"] : null)) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\"><i class=\"fa fa-users menu_icon\"></i><span class=\"menu_text\">Участники</span></a>
        ");
            // line 23
            if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "users")) {
                echo \layout::func_from_text("<a class=\"btn btn-primary ");
                if ((isset($context["add_users_button"]) ? $context["add_users_button"] : null)) {
                    echo \layout::func_from_text("active");
                }
                echo \layout::func_from_text("\" href=\"/projects/users/add/");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("/\"><i class=\"fa fa-plus\"></i></a>");
            }
            // line 24
            echo \layout::func_from_text("    </div>
    ");
        }
        // line 26
        echo \layout::func_from_text("    <div class=\"btn-group\">
        <a class=\"btn btn-foxtrot ");
        // line 27
        if ((isset($context["documents_button"]) ? $context["documents_button"] : null)) {
            echo \layout::func_from_text("active");
        }
        echo \layout::func_from_text("\" href=\"/projects/documents/");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("/\"><i class=\"fa fa-file-text-o menu_icon\"></i><span class=\"menu_text\">Wiki</span></a>
        ");
        // line 28
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "documents")) {
            echo \layout::func_from_text("<a class=\"btn btn-foxtrot ");
            if ((isset($context["add_documents_button"]) ? $context["add_documents_button"] : null)) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\" href=\"/projects/documents/add/");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\"><i class=\"fa fa-plus\"></i></a>");
        }
        // line 29
        echo \layout::func_from_text("    </div>
    ");
        // line 30
        if ((!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "owner"))) {
            // line 31
            echo \layout::func_from_text("    <div class=\"btn-group\">
        <a class=\"btn btn-oscar ");
            // line 32
            if ((isset($context["forum_button"]) ? $context["forum_button"] : null)) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\" href=\"/projects/forum/");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\"><i class=\"fa fa-comments menu_icon\"></i><span class=\"menu_text\">Форум</span></a>
        ");
            // line 33
            if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "forum")) {
                echo \layout::func_from_text("<a class=\"btn btn-oscar ");
                if ((isset($context["add_forum_button"]) ? $context["add_forum_button"] : null)) {
                    echo \layout::func_from_text("active");
                }
                echo \layout::func_from_text("\" href=\"/projects/forum/add/");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("/\"><i class=\"fa fa-plus\"></i></a>");
            }
            // line 34
            echo \layout::func_from_text("        <!--<div class=\"nickname\" style=\"font-size: 12px;position: absolute;margin-top: -6px;\">Новые: ");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "count_new_posts"), "html", null, true));
            echo \layout::func_from_text("</div>-->
    </div>
    ");
        }
        // line 37
        echo \layout::func_from_text("    <div class=\"btn-group\">
        ");
        // line 38
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "edit_project")) {
            echo \layout::func_from_text("<a class=\"btn btn-danger ");
            if ((isset($context["edit_button"]) ? $context["edit_button"] : null)) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\" href=\"/projects/edit/");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\"><i class=\"fa fa-pencil\"></i></a>");
        }
        // line 39
        echo \layout::func_from_text("        ");
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "delete_project")) {
            echo \layout::func_from_text("<a class=\"btn btn-danger delete_project\" href=\"\" project_id=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\" data-name=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("\"><i class=\"fa fa-trash-o\"></i></a>");
        }
        // line 40
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
        return array (  210 => 40,  201 => 39,  191 => 38,  188 => 37,  181 => 34,  171 => 33,  163 => 32,  160 => 31,  158 => 30,  155 => 29,  145 => 28,  137 => 27,  134 => 26,  120 => 23,  109 => 21,  107 => 20,  104 => 19,  88 => 15,  70 => 13,  59 => 11,  55 => 9,  45 => 8,  37 => 7,  23 => 3,  94 => 22,  79 => 18,  76 => 17,  62 => 12,  57 => 11,  50 => 9,  47 => 8,  21 => 2,  56 => 8,  38 => 4,  27 => 6,  75 => 8,  61 => 7,  48 => 6,  24 => 3,  22 => 2,  19 => 1,  139 => 54,  130 => 24,  128 => 54,  117 => 46,  108 => 23,  100 => 18,  83 => 31,  81 => 19,  74 => 27,  44 => 7,  41 => 5,  34 => 6,  31 => 2,  78 => 14,  71 => 26,  68 => 15,  54 => 10,  51 => 12,  43 => 8,  40 => 7,  33 => 4,  30 => 5,  115 => 45,  112 => 22,  102 => 37,  98 => 35,  92 => 17,  90 => 36,  86 => 20,  82 => 30,  77 => 27,  73 => 26,  65 => 21,  63 => 19,  60 => 12,  52 => 13,  49 => 6,  42 => 8,  39 => 7,  32 => 5,  29 => 3,);
    }
}
