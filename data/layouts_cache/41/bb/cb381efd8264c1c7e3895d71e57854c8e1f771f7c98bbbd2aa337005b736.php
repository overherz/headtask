<?php

/* applications\projects\layouts\documents/documents_show.html */
class __TwigTemplate_41bbcb381efd8264c1c7e3895d71e57854c8e1f771f7c98bbbd2aa337005b736 extends Twig_Template
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
        if ((isset($context["task"]) ? $context["task"] : null)) {
        }
    }

    // line 7
    public function block_js($context, array $blocks = array())
    {
        // line 8
        $this->displayParentBlock("js", $context, $blocks);
        echo \layout::func_from_text("
<script src=\"");
        // line 9
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\" xmlns=\"http://www.w3.org/1999/html\"></script>
");
    }

    // line 12
    public function block_project_data($context, array $blocks = array())
    {
        // line 13
        echo \layout::func_from_text("<ul class=\"breadcrumb second\">
    <li><span style=\"font-weight: bold;\">Дата:</span> ");
        // line 14
        echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["documents"]) ? $context["documents"] : null), "created"), "d.m.Y H:i:s"), "html", null, true));
        echo \layout::func_from_text("</li>
    <li><span style=\"font-weight: bold;margin-left: 20px;\">Автор:</span> ");
        // line 15
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["documents"]) ? $context["documents"] : null), "fio"), "html", null, true));
        echo \layout::func_from_text(" <span style=\"color:silver;\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["documents"]) ? $context["documents"] : null), "nickname"), "html", null, true));
        echo \layout::func_from_text("</span> </li>

    ");
        // line 17
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "documents")) {
            // line 18
            echo \layout::func_from_text("    <div class=\"btn-group\" style=\"float: right;margin-right: 2px;\">
        <a class=\"btn btn-foxtrot btn-small\" href=\"/projects/documents/edit/");
            // line 19
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["documents"]) ? $context["documents"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\"><i class=\"fa fa-pencil\"></i></a>
        <a class=\"btn btn-foxtrot btn-small\" delete_documents=");
            // line 20
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["documents"]) ? $context["documents"] : null), "id"), "html", null, true));
            echo \layout::func_from_text(" href=\"\" mode='inside'><i class=\"fa fa-trash-o\"></i></a>
    </div>
    ");
        }
        // line 23
        echo \layout::func_from_text("</ul>
<div class=\"wysiwyg\">");
        // line 24
        echo \layout::func_from_text($this->getAttribute((isset($context["documents"]) ? $context["documents"] : null), "description"));
        echo \layout::func_from_text("</div>
");
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\documents/documents_show.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 24,  81 => 23,  75 => 20,  71 => 19,  68 => 18,  66 => 17,  59 => 15,  55 => 14,  52 => 13,  49 => 12,  43 => 9,  39 => 8,  36 => 7,  31 => 4,  28 => 3,);
    }
}
