<?php

/* /applications/projects/layouts/files/files_table.html */
class __TwigTemplate_d33173ef818b74ac2522ae302791292ddda89df577bc783243507f9271a9f9f1 extends Twig_Template
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
        echo \layout::func_from_text("<table class=\"table table-hover table_style no_padding_right no_padding_left\" id=\"");
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
    </thead>
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
            echo \layout::func_from_text("\" id=\"no_file\"><span style=\"margin-left: 10px;\">файлов нет</span></td>
    ");
        }
        // line 21
        echo \layout::func_from_text("    </tbody>
</table>
");
        // line 23
        $this->env->loadTemplate("/source/jpaginator_boot_if.html")->display($context);
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
        return array (  103 => 23,  99 => 21,  89 => 19,  86 => 18,  72 => 17,  68 => 16,  50 => 15,  48 => 14,  43 => 11,  37 => 10,  21 => 2,  19 => 1,);
    }
}
