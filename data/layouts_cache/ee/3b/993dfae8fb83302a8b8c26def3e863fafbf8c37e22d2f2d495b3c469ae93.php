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
        return array (  210 => 40,  191 => 38,  171 => 33,  163 => 32,  158 => 30,  145 => 28,  137 => 27,  130 => 24,  120 => 23,  109 => 21,  100 => 18,  88 => 15,  59 => 11,  37 => 7,  23 => 3,  78 => 14,  30 => 5,  106 => 21,  92 => 17,  84 => 18,  79 => 17,  77 => 16,  74 => 15,  60 => 11,  58 => 10,  48 => 6,  25 => 4,  21 => 2,  55 => 9,  33 => 4,  26 => 3,  22 => 2,  190 => 54,  184 => 53,  181 => 34,  176 => 49,  155 => 29,  151 => 46,  146 => 44,  143 => 43,  140 => 42,  134 => 26,  127 => 34,  125 => 33,  112 => 22,  104 => 19,  102 => 26,  99 => 25,  86 => 21,  81 => 20,  71 => 18,  35 => 12,  19 => 1,  220 => 117,  215 => 31,  211 => 24,  208 => 23,  205 => 22,  201 => 39,  198 => 15,  193 => 4,  188 => 37,  186 => 117,  183 => 116,  177 => 113,  173 => 112,  169 => 111,  165 => 110,  162 => 109,  160 => 31,  156 => 106,  113 => 65,  111 => 64,  89 => 47,  85 => 46,  82 => 45,  66 => 13,  64 => 31,  47 => 17,  45 => 8,  24 => 3,  75 => 8,  70 => 13,  68 => 17,  63 => 14,  61 => 7,  54 => 22,  34 => 6,  51 => 9,  44 => 6,  41 => 14,  38 => 13,  31 => 11,  28 => 3,  121 => 31,  118 => 47,  107 => 20,  103 => 37,  97 => 24,  95 => 50,  91 => 22,  87 => 32,  80 => 44,  76 => 19,  67 => 17,  65 => 18,  62 => 12,  56 => 25,  52 => 8,  49 => 16,  42 => 5,  39 => 5,  32 => 5,  29 => 4,);
    }
}
