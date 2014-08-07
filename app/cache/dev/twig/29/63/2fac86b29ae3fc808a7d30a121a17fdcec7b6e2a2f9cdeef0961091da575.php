<?php

/* AltSTUVizBundle:Default:index.html.twig */
class __TwigTemplate_29632fac86b29ae3fc808a7d30a121a17fdcec7b6e2a2f9cdeef0961091da575 extends Twig_Template
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

    .chart div {
      font: 10px sans-serif;
      background-color: steelblue;
      text-align: right;
      padding: 3px;
      margin: 1px;
      color: white;
    }  
      .chart rect {
      fill: steelblue;
    }

    .chart text {
      fill: white;
      font: 10px sans-serif;
      text-anchor: end;
    }
    </style>
    <head>
        <title>Chart test</title>
    </head>
    <body>        
        Here must be chart!
        <svg class=\"chart\"></svg>
        ";
        // line 29
        $this->displayBlock('javascripts', $context, $blocks);
        // line 76
        echo "        Here it must end.
        <br><a href=\"/Symfony/web/app_dev.php/questions/1/pdf\"> Generate the pdf!</a>
        <a href=\"/Symfony/web/app_dev.php/questions/1/img\"> Generate the image!</a>
    </body>
</html>
";
    }

    // line 29
    public function block_javascripts($context, array $blocks = array())
    {
        // line 30
        echo "        <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/js/d3.v3.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
        <script>
            var width = 420,
            barHeight = 20;

            var x = d3.scale.linear()
                .range([0, width]);

            var chart = d3.select(\".chart\")
                .attr(\"width\", width);
            //var data = [4, 8, 15, 16, 23, 42];
            
              d3.csv(\"/Symfony/web/data.csv\", type, function(error, data) {
              x.domain([0, d3.max(data, function(d) { return d.value; })]);

              chart.attr(\"height\", barHeight * data.length);

              var bar = chart.selectAll(\"g\")
                  .data(data)
                .enter().append(\"g\")
                  .attr(\"transform\", function(d, i) { return \"translate(0,\" + i * barHeight + \")\"; });

              bar.append(\"rect\")
                  .attr(\"width\", function(d) { return x(d.value); })
                  .attr(\"height\", barHeight - 1);

              bar.append(\"text\")
                  .attr(\"x\", function(d) { return x(d.value) - 3; })
                  .attr(\"y\", barHeight / 2)
                  .attr(\"dy\", \".35em\")
                  .text(function(d) { return d.value; });
            });

            function type(d) {
              d.value = +d.value; // coerce to number
              return d;
            }
            //////////////////
            /*d3.select(\".chart\")
          .selectAll(\"div\")
            .data(data)
          .enter().append(\"div\")
            .style(\"width\", function(d) { return d * 10 + \"px\"; })
            .text(function(d) { return d; });*/
        </script>
        ";
    }

    public function getTemplateName()
    {
        return "AltSTUVizBundle:Default:index.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  110 => 72,  77 => 47,  100 => 60,  34 => 57,  20 => 1,  76 => 34,  65 => 21,  81 => 30,  58 => 25,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 55,  132 => 51,  128 => 49,  107 => 36,  61 => 29,  273 => 96,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 61,  143 => 56,  135 => 53,  119 => 42,  102 => 32,  71 => 19,  67 => 46,  63 => 15,  59 => 18,  38 => 6,  201 => 92,  196 => 90,  183 => 82,  171 => 61,  166 => 71,  163 => 62,  158 => 67,  156 => 66,  151 => 63,  142 => 59,  138 => 54,  136 => 56,  121 => 80,  117 => 44,  105 => 70,  91 => 60,  62 => 23,  49 => 19,  28 => 3,  26 => 5,  87 => 25,  21 => 2,  31 => 8,  25 => 5,  94 => 28,  89 => 55,  85 => 25,  75 => 17,  68 => 27,  56 => 9,  24 => 4,  19 => 1,  93 => 56,  88 => 59,  78 => 21,  46 => 7,  44 => 11,  27 => 7,  79 => 18,  72 => 25,  69 => 140,  47 => 12,  40 => 10,  37 => 9,  22 => 2,  246 => 90,  157 => 56,  145 => 46,  139 => 45,  131 => 52,  123 => 47,  120 => 40,  115 => 43,  111 => 37,  108 => 36,  101 => 32,  98 => 31,  96 => 31,  83 => 25,  74 => 46,  66 => 24,  55 => 17,  52 => 76,  50 => 29,  43 => 12,  41 => 5,  35 => 9,  32 => 11,  29 => 6,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 72,  164 => 59,  162 => 57,  154 => 106,  149 => 51,  147 => 101,  144 => 49,  141 => 48,  133 => 55,  130 => 41,  125 => 81,  122 => 43,  116 => 41,  112 => 42,  109 => 53,  106 => 36,  103 => 32,  99 => 31,  95 => 28,  92 => 21,  86 => 28,  82 => 192,  80 => 59,  73 => 19,  64 => 30,  60 => 16,  57 => 11,  54 => 10,  51 => 13,  48 => 22,  45 => 17,  42 => 7,  39 => 10,  36 => 5,  33 => 10,  30 => 7,);
    }
}
