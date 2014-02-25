<?php

/* /applications/projects/layouts/files/files_table.html */
class __TwigTemplate_aad0d2724dcde3f542cdebd2c2ab2655ac6ed28103659cda937c057ddbd00560 extends Twig_Template
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
        echo \layout::func_from_text("<table class=\"table table-hover table-condensed\" id=\"");
        if (((!(isset($context["get_popup_files"]) ? $context["get_popup_files"] : null)) && (!$this->getAttribute((isset($context["post_data"]) ? $context["post_data"] : null), "get_popup_files")))) {
            echo \layout::func_from_text("files_table");
        } else {
            echo \layout::func_from_text("popup_files_table");
        }
        echo \layout::func_from_text("\">
    <thead>
    <tr>
        <th>Файл</th>
        <th>Название</th>
        <th>Создан</th>
        <th>Размер</th>
        <th>Добавил</th>
        ");
        // line 10
        if ((!(isset($context["show_task"]) ? $context["show_task"] : null))) {
            if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "delete_files")) {
                echo \layout::func_from_text("<th></th>");
            }
        }
        // line 11
        echo \layout::func_from_text("    </tr>

    <tbody>
    ");
        // line 14
        if ((isset($context["files"]) ? $context["files"] : null)) {
            // line 15
            echo \layout::func_from_text("    ");
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["files"]) ? $context["files"] : null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
                // line 16
                echo \layout::func_from_text("        ");
                $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "files/file.html"), "method"));
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 18
            echo \layout::func_from_text("    ");
        } else {
            // line 19
            echo \layout::func_from_text("    <td colspan=\"");
            if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "delete_files")) {
                echo \layout::func_from_text("5");
            } else {
                echo \layout::func_from_text("4");
            }
            echo \layout::func_from_text("\" id=\"no_file\">файлов нет</td>
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
        return "/applications/projects/layouts/files/files_table.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 23,  89 => 19,  86 => 18,  72 => 17,  68 => 16,  48 => 14,  37 => 10,  21 => 2,  19 => 1,  396 => 155,  392 => 153,  388 => 152,  383 => 149,  381 => 148,  377 => 146,  374 => 145,  371 => 144,  368 => 143,  364 => 142,  360 => 140,  358 => 139,  353 => 136,  338 => 134,  334 => 133,  328 => 129,  319 => 125,  310 => 119,  305 => 116,  299 => 112,  278 => 110,  274 => 109,  267 => 104,  264 => 103,  262 => 102,  259 => 101,  250 => 95,  237 => 87,  231 => 86,  225 => 85,  219 => 84,  213 => 80,  211 => 79,  205 => 76,  197 => 73,  192 => 70,  185 => 68,  178 => 67,  176 => 66,  169 => 65,  165 => 64,  158 => 59,  151 => 55,  146 => 52,  140 => 48,  131 => 47,  127 => 46,  121 => 42,  119 => 41,  113 => 38,  108 => 35,  105 => 34,  99 => 21,  94 => 30,  88 => 28,  82 => 26,  80 => 25,  77 => 24,  74 => 23,  67 => 20,  63 => 18,  61 => 17,  53 => 13,  50 => 15,  43 => 11,  40 => 7,  32 => 4,  29 => 3,);
    }
}
