<?php

/* applications/projects/layouts/tasks/tasks_table.html */
class __TwigTemplate_2b5dc49404c767ac501dc42508130342f318177abfbcdf49de82ad20260a9cd3 extends Twig_Template
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
        echo \layout::func_from_text("<div style=\"position: relative;margin-top: 10px;\">");
        $this->env->loadTemplate("/source/jpaginator_boot.html")->display($context);
        echo \layout::func_from_text("</div>
<table class=\"table table-hover table_style\" id=\"tasks_table\">
    <thead>
    <tr>
        <th></th>
        <th>Название</th>
        <th>Статус</th>
        <th>Делегировано</th>
        <th><i class=\"fa fa-calendar\"></i></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    ");
        // line 14
        if ((isset($context["tasks"]) ? $context["tasks"] : null)) {
            // line 15
            echo \layout::func_from_text("    ");
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["tasks"]) ? $context["tasks"] : null));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["task"]) {
                // line 16
                echo \layout::func_from_text("        ");
                $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks/task.html"), "method"));
                $template->display($context);
                // line 17
                echo \layout::func_from_text("    ");
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['task'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 18
            echo \layout::func_from_text("    ");
        } else {
            // line 19
            echo \layout::func_from_text("    <td colspan=\"6\" id=\"no_file\">задач нет</td>
    ");
        }
        // line 21
        echo \layout::func_from_text("    </tbody>
</table>
");
        // line 23
        $this->env->loadTemplate("/source/jpaginator_boot.html")->display($context);
    }

    public function getTemplateName()
    {
        return "applications/projects/layouts/tasks/tasks_table.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 23,  81 => 21,  77 => 19,  74 => 18,  60 => 17,  56 => 16,  38 => 15,  36 => 14,  19 => 1,);
    }
}
