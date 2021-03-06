<?php

/* /applications/projects/layouts/documents/documents_table.html */
class __TwigTemplate_f403680c03536a19c9107d9efee916c033be30f675c9c74fc496fa9ed5886b2f extends Twig_Template
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
        echo \layout::func_from_text("<table class=\"table table-hover table_style no_padding_right\" id=\"documents_table\">
    <thead>
    <tr>
        <th>Название</th>
        <th>Дата</th>
        <th>Автор</th>
        ");
        // line 8
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "documents")) {
            echo \layout::func_from_text("<th></th>");
        }
        // line 9
        echo \layout::func_from_text("    </tr>
    </thead>
    <tbody>
    ");
        // line 12
        if ((isset($context["documents"]) ? $context["documents"] : null)) {
            // line 13
            echo \layout::func_from_text("    ");
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["documents"]) ? $context["documents"] : null));
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
                // line 14
                echo \layout::func_from_text("        ");
                $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "documents/documents_element.html"), "method"));
                $template->display($context);
                // line 15
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
            // line 16
            echo \layout::func_from_text("    ");
        } else {
            // line 17
            echo \layout::func_from_text("    <td colspan=\"4\" id=\"no_file\">документов нет</td>
    ");
        }
        // line 19
        echo \layout::func_from_text("    </tbody>
</table>
");
        // line 21
        $this->env->loadTemplate("/source/jpaginator_boot_if.html")->display($context);
    }

    public function getTemplateName()
    {
        return "/applications/projects/layouts/documents/documents_table.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 21,  83 => 19,  79 => 17,  76 => 16,  62 => 15,  40 => 13,  38 => 12,  33 => 9,  29 => 8,  21 => 2,  19 => 1,  61 => 16,  58 => 14,  54 => 13,  52 => 12,  49 => 11,  43 => 8,  39 => 7,  36 => 6,  31 => 4,  28 => 3,);
    }
}
