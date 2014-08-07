<?php

/* AltSTUVizBundle:Default:pie.html.twig */
class __TwigTemplate_bf28b08e2cf1cffcb984e5ce4d119b4bb89c782806c05b2355de58ac2061b2ab extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <style>
        
    </style>
<head>
        <title>PieChart test</title>
</head>
<body>        
        Here must be pie chart!
        <svg class=\"chart\"></svg>
        ";
        // line 12
        $this->displayBlock('javascripts', $context, $blocks);
        // line 72
        echo "        Here it must end.
        
    </body>
</html>";
    }

    // line 12
    public function block_javascripts($context, array $blocks = array())
    {
        // line 13
        echo "        <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/Symfony/web/js/d3.v3.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
        <script>
            var width = 960,
                height = 500,
                radius = Math.min(width, height) / 2 - 10;

            var data = d3.range(10).map(Math.random).sort(d3.descending);

            var color = d3.scale.category20();
            //var arc = d3.svg.arc()
            //    .outerRadius(radius);
            var pie = d3.layout.pie();
                .value(function(d) { return d.count; })
                .sort(null);
            
            var arc = d3.svg.arc()
                .innerRadius(radius - 100)
                .outerRadius(radius - 20);
            
            var svg = d3.select(\"body\").append(\"svg\")
                .datum(data)
                .attr(\"width\", width)
                .attr(\"height\", height)
              .append(\"g\")
                .attr(\"transform\", \"translate(\" + width / 2 + \",\" + height / 2 + \")\");
        
            /*var arcs = svg.selectAll(\"g.arc\")
                .data(pie)
              .enter().append(\"g\")
                .attr(\"class\", \"arc\");
            
            arcs.append(\"path\")
                .attr(\"fill\",function(d, i) { return color(i); })*/

            /*arcs.append(\"path\")
                .attr(\"fill\", function(d, i) { return color(i); })
              .transition()
                .ease(\"bounce\")
                .duration(2000)
                .attrTween(\"d\", tweenPie)
              .transition()
                .ease(\"elastic\")
                .delay(function(d, i) { return 2000 + i * 50; })
                .duration(750)
                .attrTween(\"d\", tweenDonut);

            function tweenPie(b) {
              b.innerRadius = 0;
              var i = d3.interpolate({startAngle: 0, endAngle: 0}, b);
              return function(t) { return arc(i(t)); };
            }

            function tweenDonut(b) {
              b.innerRadius = radius * .6;
              var i = d3.interpolate({innerRadius: 0}, b);
              return function(t) { return arc(i(t)); };
            }*/
        </script>
        ";
    }

    public function getTemplateName()
    {
        return "AltSTUVizBundle:Default:pie.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  110 => 72,  77 => 47,  100 => 60,  34 => 57,  20 => 1,  76 => 34,  65 => 21,  81 => 30,  58 => 25,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 55,  132 => 51,  128 => 49,  107 => 36,  61 => 29,  273 => 96,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 61,  143 => 56,  135 => 53,  119 => 42,  102 => 32,  71 => 19,  67 => 46,  63 => 30,  59 => 18,  38 => 6,  201 => 92,  196 => 90,  183 => 82,  171 => 61,  166 => 71,  163 => 62,  158 => 67,  156 => 66,  151 => 63,  142 => 59,  138 => 54,  136 => 56,  121 => 80,  117 => 44,  105 => 70,  91 => 60,  62 => 23,  49 => 19,  28 => 3,  26 => 5,  87 => 25,  21 => 2,  31 => 8,  25 => 5,  94 => 28,  89 => 55,  85 => 25,  75 => 17,  68 => 27,  56 => 9,  24 => 4,  19 => 1,  93 => 56,  88 => 59,  78 => 21,  46 => 7,  44 => 11,  27 => 7,  79 => 18,  72 => 25,  69 => 140,  47 => 12,  40 => 10,  37 => 9,  22 => 2,  246 => 90,  157 => 56,  145 => 46,  139 => 45,  131 => 52,  123 => 47,  120 => 40,  115 => 43,  111 => 37,  108 => 36,  101 => 32,  98 => 31,  96 => 31,  83 => 25,  74 => 46,  66 => 24,  55 => 17,  52 => 76,  50 => 29,  43 => 12,  41 => 5,  35 => 72,  32 => 11,  29 => 6,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 72,  164 => 59,  162 => 57,  154 => 106,  149 => 51,  147 => 101,  144 => 49,  141 => 48,  133 => 55,  130 => 41,  125 => 81,  122 => 43,  116 => 41,  112 => 42,  109 => 53,  106 => 36,  103 => 32,  99 => 31,  95 => 28,  92 => 21,  86 => 28,  82 => 192,  80 => 59,  73 => 19,  64 => 30,  60 => 29,  57 => 11,  54 => 10,  51 => 13,  48 => 22,  45 => 13,  42 => 12,  39 => 10,  36 => 5,  33 => 12,  30 => 7,);
    }
}
