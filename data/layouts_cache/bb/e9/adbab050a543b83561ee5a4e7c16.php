<?php

/* /applications/projects/layouts/tasks/tasks_table.html */
class __TwigTemplate_bbe9adbab050a543b83561ee5a4e7c16 extends Twig_Template
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
        echo \layout::func_from_text("<script>
    \$(document).ready(function (\$) {
        \$(\".get_info\").popover({
            offset: 10,
            trigger: 'manual',
            html: true,
            placement: 'right',
            template: '<div class=\"popover\" onmouseover=\"clearTimeout(timeoutObj);\$(this).mouseleave(function() {\$(this).hide();});\"><div class=\"arrow\"></div><div class=\"popover-inner\"><h3 class=\"popover-title\"></h3><div class=\"popover-content\"><p></p></div></div></div>'
        }).mouseenter(function(e) {
            \$(this).popover('show');
        }).mouseleave(function(e) {
            var ref = \$(this);
            timeoutObj = setTimeout(function(){
                ref.popover('hide');
            }, 50);
        });

        animate_progress_bars();
    });
</script>
<div style=\"position: relative;margin-top: 10px;\">");
        // line 21
        $this->env->loadTemplate("/source/jpaginator_boot.html")->display($context);
        // line 22
        echo \layout::func_from_text("    <div style=\"position: absolute;right:0;bottom:0;\"><a href=\"\" id=\"show_filter\">Фильтр</a></div>
</div>
<table class=\"table table-bordered table-hover table-condensed\" id=\"tasks_table\">
    <tr>
        <th></th>
        <th>Название</th>
        <th>Статус</th>
        <th>Приоритет</th>
        <th>Делегировано</th>
        <th>Статус выполнения</th>
        <th></th>
    </tr>
    <tbody>
    ");
        // line 35
        if ((isset($context["tasks"]) ? $context["tasks"] : null)) {
            // line 36
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
                // line 37
                echo \layout::func_from_text("        ");
                $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks/task.html"), "method"));
                $template->display($context);
                // line 38
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
            // line 39
            echo \layout::func_from_text("    ");
        } else {
            // line 40
            echo \layout::func_from_text("    <td colspan=\"6\" id=\"no_file\">задач нет</td>
    ");
        }
        // line 42
        echo \layout::func_from_text("    </tbody>
</table>
");
        // line 44
        $this->env->loadTemplate("/source/jpaginator_boot.html")->display($context);
    }

    public function getTemplateName()
    {
        return "/applications/projects/layouts/tasks/tasks_table.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 44,  103 => 42,  99 => 40,  96 => 39,  82 => 38,  78 => 37,  60 => 36,  58 => 35,  41 => 21,  19 => 1,  84 => 10,  80 => 8,  65 => 6,  61 => 5,  43 => 22,  40 => 3,  34 => 2,  21 => 1,  108 => 44,  105 => 43,  95 => 36,  89 => 33,  85 => 32,  81 => 31,  69 => 21,  67 => 20,  64 => 19,  57 => 15,  52 => 13,  49 => 12,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
