<?php

/* applications\projects\layouts\calendar/calendar_new.html */
class __TwigTemplate_dafc0ccdfdccc009c957959fba9fd712113cf6098b36ac5f365eb179c96f5050 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/wrapper_index.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'js' => array($this, 'block_js'),
            'css' => array($this, 'block_css'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "/source/wrapper_index.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo \layout::func_from_text("Календарь");
    }

    // line 5
    public function block_js($context, array $blocks = array())
    {
        // line 6
        echo \layout::func_from_text("<script type=\"text/javascript\" src=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "calendar.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
<script src=\"/source/admin/js/libs/moment.min.js\"></script>
<script src=\"/source/admin/js/libs/fullcalendar.min.js\"></script>
<script src=\"/source/admin/js/libs/gcal.js\"></script>
<script>
    \$(document).ready(function(){
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    \$('.fullcalendar').fullCalendar({
        firstDay: 1,
        height: 350,
        editable: true,
        events: [
            ");
        // line 22
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
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 23
            echo \layout::func_from_text("            {
                title: \"");
            // line 24
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("\",
                allDay: true,
            ");
            // line 26
            if (($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "type") == "error")) {
                echo \layout::func_from_text("color: \"#860000\",");
            }
            // line 27
            echo \layout::func_from_text("                start: new Date(\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "start"), "html", null, true));
            echo \layout::func_from_text("\")
                ");
            // line 28
            if ($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "end")) {
                echo \layout::func_from_text(",end: new Date(\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "end"), "html", null, true));
                echo \layout::func_from_text("\")");
            }
            // line 29
            echo \layout::func_from_text("            }
            ");
            // line 30
            if ((!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last"))) {
                echo \layout::func_from_text(",");
            }
            // line 31
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo \layout::func_from_text("        ],
        header: {
            left: '',
            right: 'title'
        }
    });

    \$('.calendar .view-options li a').click( function() {
        \$('.calendar .view-options li').removeClass('active');
        \$(this).parent('li').addClass('active');
        \$(this).parents('.panel').find('.fullCalendar').fullCalendar('changeView', \$(this).attr('data-view'));
        return false;
    });

    \$('.calendar .navigator li a').click( function() {
        \$(this).parents('.panel').find('.fullCalendar').fullCalendar(\$(this).attr('data-view'));
        return false;
    });
    });
</script>
");
    }

    // line 55
    public function block_css($context, array $blocks = array())
    {
        // line 56
        echo \layout::func_from_text("    <link rel=\"stylesheet\" type=\"text/css\" href=\"/libraries/calendar/calendar.css\">
    <link href=\"/source/admin/css/libs/fullcalendar.css\" rel=\"stylesheet\">
    <link href=\"");
        // line 58
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "calendar.css"), "method"), "html", null, true));
        echo \layout::func_from_text("\" rel=\"stylesheet\">
");
    }

    // line 61
    public function block_body($context, array $blocks = array())
    {
        // line 62
        echo \layout::func_from_text("    <div id=\"content\">
        <div class=\"container_fluid\">
            <div class=\"row\">
                <div class=\"col-lg-12\">
                    <div class=\"panel panel-primary calendar\">
                        <div class=\"panel-heading\">
                            <h3 class=\"panel-title\">Activity Calendar</h3>
                            <div class=\"panel-utility pull-right\">
                                <!-- Nav tabs -->
                                <ul class=\"nav nav-pills navigator\">
                                    <li><a href=\"#\" data-view=\"prev\"><i class=\"fa fa-arrow-left\"></i></a></li>
                                    <li><a href=\"#\" data-view=\"today\">Today</a></li>
                                    <li><a href=\"#\" data-view=\"next\"><i class=\"fa fa-arrow-right\"></i></a></li>
                                </ul>

                                <ul class=\"nav nav-pills view-options\">
                                    <li class=\"active\"><a href=\"#\" data-view=\"month\">Month</a></li>
                                    <li><a href=\"#\" data-view=\"agendaWeek\">Week</a></li>
                                    <li><a href=\"#\" data-view=\"agendaDay\">Day</a></li>
                                </ul>
                            </div>
                        </div><!-- /.panel-heading -->
                        <div class=\"panel-body\">
                            <div id=\"fullcalendar\" class=\"fullcalendar fullCalendar\"></div>
                        </div><!-- /.panel-body -->
                    </div><!-- /.panel-primary -->
                </div><!-- /.col-lg-8 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
");
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\calendar/calendar_new.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  161 => 62,  158 => 61,  152 => 58,  148 => 56,  145 => 55,  121 => 32,  107 => 31,  103 => 30,  100 => 29,  94 => 28,  89 => 27,  85 => 26,  80 => 24,  77 => 23,  60 => 22,  40 => 6,  37 => 5,  31 => 3,);
    }
}
