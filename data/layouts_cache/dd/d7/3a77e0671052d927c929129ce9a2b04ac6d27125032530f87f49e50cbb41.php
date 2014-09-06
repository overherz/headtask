<?php

/* /applications/projects/layouts/all_projects_table.html */
class __TwigTemplate_ddd73a77e0671052d927c929129ce9a2b04ac6d27125032530f87f49e50cbb41 extends Twig_Template
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
        if ((isset($context["all_projects"]) ? $context["all_projects"] : null)) {
            // line 3
            echo \layout::func_from_text("    <table class=\"table table_style\">
        <tr>
            ");
            // line 5
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["all_projects"]) ? $context["all_projects"] : null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 6
                echo \layout::func_from_text("            <td style=\"width:33%;font-size: 20px;\">
                ");
                // line 7
                if (((!$this->getAttribute((isset($context["p"]) ? $context["p"] : null), "role")) && ($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_group") != 1))) {
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "name"), "html", null, true));
                    echo \layout::func_from_text("
                ");
                } else {
                    // line 9
                    echo \layout::func_from_text("                    <a href=\"/projects/~");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true));
                    echo \layout::func_from_text("\"> ");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "name"), "html", null, true));
                    echo \layout::func_from_text("</a>
                ");
                }
                // line 11
                echo \layout::func_from_text("                ");
                if ($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "role")) {
                    // line 12
                    echo \layout::func_from_text("                    <div style=\"font-weight: bold;font-size: 10px;\">
                        ");
                    // line 13
                    if (($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "role") == "manager")) {
                        echo \layout::func_from_text("Менеджер
                        ");
                    } elseif (($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "role") == "user")) {
                        // line 14
                        echo \layout::func_from_text("Участник
                        ");
                    }
                    // line 16
                    echo \layout::func_from_text("                    </div>
                ");
                }
                // line 18
                echo \layout::func_from_text("            </td>
        ");
                // line 19
                if (((($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") % 3) == 0) && (!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last")))) {
                    echo \layout::func_from_text("<tr>");
                }
                // line 20
                echo \layout::func_from_text("            ");
                if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last") && (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") % 3) > 0))) {
                    // line 21
                    echo \layout::func_from_text("                ");
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable(range(1, (3 - ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") % 3))));
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
                    foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                        // line 22
                        echo \layout::func_from_text("                    <td>&nbsp;</td>
                ");
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
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 24
                    echo \layout::func_from_text("            ");
                }
                // line 25
                echo \layout::func_from_text("            ");
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 26
            echo \layout::func_from_text("    </table>
");
        } else {
            // line 28
            echo \layout::func_from_text("    проекты не найдены
");
        }
        // line 30
        $this->env->loadTemplate("/source/jpaginator_boot_if.html")->display($context);
    }

    public function getTemplateName()
    {
        return "/applications/projects/layouts/all_projects_table.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 30,  144 => 28,  140 => 26,  126 => 25,  123 => 24,  108 => 22,  90 => 21,  87 => 20,  83 => 19,  80 => 18,  76 => 16,  72 => 14,  67 => 13,  64 => 12,  61 => 11,  53 => 9,  47 => 7,  44 => 6,  27 => 5,  23 => 3,  21 => 2,  19 => 1,);
    }
}
