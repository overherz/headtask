<?php

/* applications\projects\layouts\files/popup_files.html */
class __TwigTemplate_c3d38cbb321fe8e7701a29a6e211bc4b extends Twig_Template
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
        echo \layout::func_from_text("<table class=\"table table-bordered table-condensed\" style=\"background: #fff;min-width: 700px;\" id=\"");
        if (((!(isset($context["get_popup_files"]) ? $context["get_popup_files"] : null)) && (!$this->getAttribute((isset($context["post_data"]) ? $context["post_data"] : null), "get_popup_files")))) {
            echo \layout::func_from_text("files_table");
        } else {
            echo \layout::func_from_text("popup_files_table");
        }
        echo \layout::func_from_text("\">
    <tr>
        <th>Файл</th>
        <th>Описание</th>
        <th>Создан</th>
        <th>Размер</th>
        <th>Добавил</th>
        <th></th>
    </tr>
    <tbody>
    ");
        // line 12
        if ((isset($context["files"]) ? $context["files"] : null)) {
            // line 13
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
                // line 14
                echo \layout::func_from_text("    ");
                $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "files/popup_file.html"), "method"));
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 16
            echo \layout::func_from_text("    ");
        } else {
            // line 17
            echo \layout::func_from_text("    <td colspan=\"5\" id=\"no_file\">файлов нет</td>
    ");
        }
        // line 19
        echo \layout::func_from_text("    </tbody>
</table>");
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\files/popup_files.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 19,  80 => 17,  77 => 16,  63 => 15,  59 => 14,  41 => 13,  39 => 12,  21 => 2,  19 => 1,);
    }
}
