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
    ");
        // line 2
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "show_review")) {
            // line 3
            echo \layout::func_from_text("    <div class=\"btn-group\">
        <a class=\"btn btn-india pajax ");
            // line 4
            if ((isset($context["review_button"]) ? $context["review_button"] : null)) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\" href=\"/projects/~");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\"><i class=\"fa fa-info menu_icon\"></i><span class=\"menu_text\">Обзор</span></a>
    </div>
    ");
        }
        // line 7
        echo \layout::func_from_text("    ");
        if (((!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "owner")) && $this->getAttribute((isset($context["access"]) ? $context["access"] : null), "show_news"))) {
            // line 8
            echo \layout::func_from_text("    <div class=\"btn-group\">
        <a class=\"btn btn-black pajax ");
            // line 9
            if ((isset($context["news_button"]) ? $context["news_button"] : null)) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\" href=\"/projects/news/");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\"><i class=\"fa fa-rss menu_icon\"></i><span class=\"menu_text\">Новости</span></a>
        ");
            // line 10
            if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "news")) {
                echo \layout::func_from_text("<a class=\"btn btn-black ");
                if ((isset($context["add_news_button"]) ? $context["add_news_button"] : null)) {
                    echo \layout::func_from_text("active");
                }
                echo \layout::func_from_text("\" href=\"/projects/news/add/");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("/\"><i class=\"fa fa-plus\"></i></a>");
            }
            // line 11
            echo \layout::func_from_text("    </div>
    ");
        }
        // line 13
        echo \layout::func_from_text("    <div class=\"btn-group\">
        <a class=\"btn btn-success pajax ");
        // line 14
        if ((isset($context["tasks_button"]) ? $context["tasks_button"] : null)) {
            echo \layout::func_from_text("active");
        }
        echo \layout::func_from_text("\" href=\"/projects/tasks/");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("/\"><i class=\"fa fa-tasks menu_icon\"></i><span class=\"menu_text\">Задачи</span></a>
        <a class=\"btn btn-success pajax ");
        // line 15
        if ((isset($context["gantt_button"]) ? $context["gantt_button"] : null)) {
            echo \layout::func_from_text("active");
        }
        echo \layout::func_from_text("\" href=\"/projects/gantt/");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("/\"><i class=\"fa fa-bar-chart-o\"></i></a>
        ");
        // line 16
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_task")) {
            echo \layout::func_from_text("<a class=\"btn btn-success ");
            if ((isset($context["add_tasks_button"]) ? $context["add_tasks_button"] : null)) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\" href=\"/projects/tasks/add/");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\"><i class=\"fa fa-plus\"></i></a>");
        }
        // line 17
        echo \layout::func_from_text("    </div>

    <div class=\"btn-group\">
        <a href=\"/projects/files/");
        // line 20
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("/\" class=\"btn btn-info pajax ");
        if ((isset($context["files_button"]) ? $context["files_button"] : null)) {
            echo \layout::func_from_text("active");
        }
        echo \layout::func_from_text("\"><i class=\"fa fa-files-o menu_icon\"></i><span class=\"menu_text\">Файлы</span></a>
        ");
        // line 21
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_files")) {
            echo \layout::func_from_text("<a class=\"btn btn-info upload_files\" href=\"\"><i class=\"fa fa-plus\"></i></a>");
        }
        // line 22
        echo \layout::func_from_text("    </div>

    ");
        // line 24
        if (((!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "owner")) && $this->getAttribute((isset($context["access"]) ? $context["access"] : null), "show_users"))) {
            // line 25
            echo \layout::func_from_text("    <div class=\"btn-group\">
        <a href=\"/projects/users/");
            // line 26
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\" class=\"btn btn-primary pajax ");
            if ((isset($context["users_button"]) ? $context["users_button"] : null)) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\"><i class=\"fa fa-users menu_icon\"></i><span class=\"menu_text\">Участники</span></a>
        ");
            // line 27
            if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "users")) {
                echo \layout::func_from_text("<a class=\"btn btn-primary ");
                if ((isset($context["add_users_button"]) ? $context["add_users_button"] : null)) {
                    echo \layout::func_from_text("active");
                }
                echo \layout::func_from_text("\" href=\"/projects/users/add/");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("/\"><i class=\"fa fa-plus\"></i></a>");
            }
            // line 28
            echo \layout::func_from_text("    </div>
    ");
        }
        // line 30
        echo \layout::func_from_text("    ");
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "show_documents")) {
            // line 31
            echo \layout::func_from_text("    <div class=\"btn-group\">
        <a class=\"btn btn-foxtrot pajax ");
            // line 32
            if ((isset($context["documents_button"]) ? $context["documents_button"] : null)) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\" href=\"/projects/documents/");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\"><i class=\"fa fa-file-text-o menu_icon\"></i><span class=\"menu_text\">Wiki</span></a>
        ");
            // line 33
            if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "documents")) {
                echo \layout::func_from_text("<a class=\"btn btn-foxtrot ");
                if ((isset($context["add_documents_button"]) ? $context["add_documents_button"] : null)) {
                    echo \layout::func_from_text("active");
                }
                echo \layout::func_from_text("\" href=\"/projects/documents/add/");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("/\"><i class=\"fa fa-plus\"></i></a>");
            }
            // line 34
            echo \layout::func_from_text("    </div>
    ");
        }
        // line 36
        echo \layout::func_from_text("    ");
        if (((!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "owner")) && $this->getAttribute((isset($context["access"]) ? $context["access"] : null), "show_forum"))) {
            // line 37
            echo \layout::func_from_text("    <div class=\"btn-group\">
        <a class=\"btn btn-oscar pajax ");
            // line 38
            if ((isset($context["forum_button"]) ? $context["forum_button"] : null)) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\" href=\"/projects/forum/");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\"><i class=\"fa fa-comments menu_icon\"></i><span class=\"menu_text\">Форум</span></a>
        ");
            // line 39
            if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "forum")) {
                echo \layout::func_from_text("<a class=\"btn btn-oscar ");
                if ((isset($context["add_forum_button"]) ? $context["add_forum_button"] : null)) {
                    echo \layout::func_from_text("active");
                }
                echo \layout::func_from_text("\" href=\"/projects/forum/add/");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("/\"><i class=\"fa fa-plus\"></i></a>");
            }
            // line 40
            echo \layout::func_from_text("        <!--<div class=\"nickname\" style=\"font-size: 12px;position: absolute;margin-top: -6px;\">Новые: ");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "count_new_posts"), "html", null, true));
            echo \layout::func_from_text("</div>-->
    </div>
    ");
        }
        // line 43
        echo \layout::func_from_text("    <div class=\"btn-group\">
        ");
        // line 44
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "edit_project")) {
            echo \layout::func_from_text("<a class=\"btn btn-danger ");
            if ((isset($context["edit_button"]) ? $context["edit_button"] : null)) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\" href=\"/projects/edit/");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\"><i class=\"fa fa-pencil\"></i></a>");
        }
        // line 45
        echo \layout::func_from_text("        ");
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "delete_project")) {
            echo \layout::func_from_text("<a class=\"btn btn-danger delete_project\" href=\"\" project_id=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\" data-name=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("\"><i class=\"fa fa-trash-o\"></i></a>");
        }
        // line 46
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
        return array (  223 => 46,  214 => 45,  204 => 44,  201 => 43,  194 => 40,  184 => 39,  176 => 38,  173 => 37,  170 => 36,  166 => 34,  156 => 33,  148 => 32,  145 => 31,  142 => 30,  138 => 28,  128 => 27,  120 => 26,  117 => 25,  115 => 24,  111 => 22,  107 => 21,  99 => 20,  94 => 17,  84 => 16,  76 => 15,  68 => 14,  65 => 13,  61 => 11,  51 => 10,  43 => 9,  40 => 8,  37 => 7,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}
