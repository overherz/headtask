<?php

/* /applications/projects/layouts/news/news_table.html */
class __TwigTemplate_6d7f13f94c6c0df88561de045a365228d2516727075bcb616df7d30f0e0a89a3 extends Twig_Template
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
        $this->env->loadTemplate("/source/jpaginator_boot.html")->display($context);
        // line 2
        echo \layout::func_from_text("<table class=\"table table-border table-hover table-condensed\" id=\"tasks_table\">
    <tr>
        <th>Название</th>
        <th>Дата</th>
        <th>Автор</th>
        ");
        // line 7
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "news")) {
            echo \layout::func_from_text("<th></th>");
        }
        // line 8
        echo \layout::func_from_text("    </tr>
    <tbody>
    ");
        // line 10
        if ((isset($context["news"]) ? $context["news"] : null)) {
            // line 11
            echo \layout::func_from_text("    ");
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["news"]) ? $context["news"] : null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["n"]) {
                // line 12
                echo \layout::func_from_text("        ");
                $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "news/news_element.html"), "method"));
                $template->display($context);
                // line 13
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['n'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 14
            echo \layout::func_from_text("    ");
        } else {
            // line 15
            echo \layout::func_from_text("    <td colspan=\"4\" id=\"no_file\">новостей нет</td>
    ");
        }
        // line 17
        echo \layout::func_from_text("    </tbody>
</table>
");
        // line 19
        $this->env->loadTemplate("/source/jpaginator_boot.html")->display($context);
    }

    public function getTemplateName()
    {
        return "/applications/projects/layouts/news/news_table.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 19,  81 => 17,  77 => 15,  74 => 14,  60 => 13,  56 => 12,  36 => 10,  32 => 8,  21 => 2,  19 => 1,  65 => 20,  62 => 19,  55 => 14,  52 => 13,  46 => 10,  41 => 8,  38 => 11,  31 => 4,  28 => 7,);
    }
}
