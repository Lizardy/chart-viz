<?php

/* AltSTUVizBundle:Viz:d3-bar.html.twig */
class __TwigTemplate_a3f46b6e76c68d344f9ecaa6a7e2fa258ed6ea8f17b2b3b4b960db4c1dcaf216 extends Twig_Template
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
<meta charset=\"utf-8\">
<style>

body {
  font: 10px sans-serif;
}

.bar rect {
  fill: steelblue;
  shape-rendering: crispEdges;
}

.bar text {
  fill: #fff;
}

.bar:hover {
    fill: #fff ;
}

.d3-tip {
  line-height: 1;
  font-weight: bold;
  padding: 12px;
  background: rgba(0, 0, 0, 0.8);
  color: #fff;
  border-radius: 2px;
}

/* Creates a small triangle extender for the tooltip */
.d3-tip:after {
  box-sizing: border-box;
  display: inline;
  font-size: 10px;
  width: 100%;
  line-height: 1;
  color: rgba(0, 0, 0, 0.8);
  content: \"\\25BC\";
  position: absolute;
  text-align: center;
}

/* Style northward tooltips differently */
.d3-tip.n:after {
  margin: -1px 0 0 0;
  top: 100%;
  left: 0;
}

.axis path, .axis line {
  fill: none;
  stroke: #000;
  shape-rendering: crispEdges;
}

</style>
<body>
";
        // line 59
        $this->displayBlock('javascripts', $context, $blocks);
        // line 192
        echo "
</body>
";
    }

    // line 59
    public function block_javascripts($context, array $blocks = array())
    {
        // line 60
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/js/d3.v3.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"http://labratrevenge.com/d3-tip/javascripts/d3.tip.v0.6.3.js\"></script>
<script>

/*var data = { \"labels\": [
    \"2013-07\",\"2013-08\",\"2013-09\",\"2013-10\",\"2013-11\",\"2013-12\",\"2014-01\",\"2014-02\",\"2014-03\",\"2014-04\",\"2014-05\",],
\"values\":
    [ 88, 40, 2160, 3585, 2527, 3167, 2328, 5797, 4895, 3396, 681,]
};*/
    
    var data = ";
        // line 70
        echo twig_jsonencode_filter((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")));
        echo ";

    var color = d3.scale.";
        // line 72
        echo twig_escape_filter($this->env, (isset($context["color"]) ? $context["color"] : $this->getContext($context, "color")), "html", null, true);
        echo "();

    var margin = {
            \"top\": 10,
            \"right\": 10,
            \"bottom\": 50,
            \"left\": 50
        },
        width = ";
        // line 80
        echo twig_escape_filter($this->env, (isset($context["w"]) ? $context["w"] : $this->getContext($context, "w")), "html", null, true);
        echo ",
        height = ";
        // line 81
        echo twig_escape_filter($this->env, (isset($context["h"]) ? $context["h"] : $this->getContext($context, "h")), "html", null, true);
        echo ";
    var need_rotate = false;
    if (width < 1000)
        {
            need_rotate =true;
            //width = 132; 
        }
    var x = d3.scale.ordinal()
        .domain(data.labels.map(function(d) {
            return d;}))
        .rangeRoundBands([0, width], 0);

    var y = d3.scale.linear()
        .domain([0, d3.max(data.values)])
        .range([height, 0]);

    var xAxis = d3.svg.axis().scale(x).orient(\"bottom\");
    var yAxis = d3.svg.axis().scale(y).orient(\"left\");

    ";
        // line 101
        echo "    var tip = d3.tip()
      .attr('class', 'd3-tip')
      .offset([-10, 0])
      .html(function(d) {
        return d;
                <!--\"<strong>\" + ";
        // line 106
        echo twig_escape_filter($this->env, (isset($context["ty"]) ? $context["ty"] : $this->getContext($context, "ty")), "html", null, true);
        echo " + \"</strong> <span style='color:red'>\" + d + \"</span>\";-->
      });

    var svgContainer = d3.select(\"body\").append(\"svg\")
        .attr(\"class\", \"chart\")
        .attr(\"width\", width + margin.left + margin.right)
        .attr(\"height\", height + margin.top + margin.bottom).append(\"g\")
        .attr(\"transform\", \"translate(\" + margin.left + \",\" + margin.right + \")\");

    svgContainer.call(tip);
    
    if (need_rotate)
    {
        svgContainer.append(\"g\")
            .attr(\"class\", \"x axis rotate_labels\")
            .attr(\"transform\", \"translate( 0,\" + height + \")\")
            .call(xAxis)
        .selectAll(\".tick text\")
            .call(wrap, x.rangeBand());
    }
    else
    {
        svgContainer.append(\"g\")
            .attr(\"class\", \"x axis\")
            .attr(\"transform\", \"translate( 0,\" + height + \")\")
            .call(xAxis)
        .selectAll(\".tick text\")
            .call(wrap, x.rangeBand());
    }

    svgContainer.append(\"g\")
        .attr(\"class\", \"y axis\").call(yAxis)
        .append(\"text\")
            .attr(\"transform\", \"rotate(-90)\")
            .attr(\"y\", 6)
            .attr(\"dy\", \".71em\")
            .style(\"text-anchor\", \"end\")
            .text(\"\");

    svgContainer.selectAll(\".bar\").data(data.values).enter().append(\"rect\")
        .style(\"fill\", color)
        .attr(\"class\", \"bar\")
        .attr(\"x\", function(d, i) {
            return i * x.rangeBand();
        })
        .attr(\"y\", function(d) {
            return y(d);
        })
        .attr(\"width\", function(){
            return x.rangeBand();
        })
        .attr(\"height\", function(d) {
            return height -y(d);
        })
        .on('mouseover', tip.show)
        .on('mouseout', tip.hide)
        
        
        function wrap(text, width) 
        {
          text.each(function() 
          {
            var text = d3.select(this),
                words = text.text().split(/\\s+/).reverse(),
                word,
                line = [],
                lineNumber = 0,
                lineHeight = 1.1, // ems
                y = text.attr(\"y\"),
                dy = parseFloat(text.attr(\"dy\")),
                tspan = text.text(null).append(\"tspan\").attr(\"x\", 0).attr(\"y\", y).attr(\"dy\", dy + \"em\");
            while (word = words.pop()) {
              line.push(word);
              tspan.text(line.join(\" \"));
              if (tspan.node().getComputedTextLength() > width) {
                line.pop();
                tspan.text(line.join(\" \"));
                line = [word];
                tspan = text.append(\"tspan\").attr(\"x\", 0).attr(\"y\", y).attr(\"dy\", ++lineNumber * lineHeight + dy + \"em\").text(word);
              }
            }
          });
      }

</script>
";
    }

    public function getTemplateName()
    {
        return "AltSTUVizBundle:Viz:d3-bar.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  110 => 72,  77 => 47,  100 => 60,  34 => 57,  20 => 1,  76 => 34,  65 => 21,  81 => 30,  58 => 25,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 55,  132 => 51,  128 => 49,  107 => 36,  61 => 28,  273 => 96,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 61,  143 => 56,  135 => 53,  119 => 42,  102 => 32,  71 => 19,  67 => 46,  63 => 15,  59 => 18,  38 => 6,  201 => 92,  196 => 90,  183 => 82,  171 => 61,  166 => 71,  163 => 62,  158 => 67,  156 => 66,  151 => 63,  142 => 59,  138 => 54,  136 => 56,  121 => 80,  117 => 44,  105 => 70,  91 => 60,  62 => 23,  49 => 19,  28 => 3,  26 => 5,  87 => 25,  21 => 2,  31 => 8,  25 => 5,  94 => 28,  89 => 55,  85 => 25,  75 => 17,  68 => 27,  56 => 9,  24 => 4,  19 => 1,  93 => 56,  88 => 59,  78 => 21,  46 => 7,  44 => 11,  27 => 7,  79 => 18,  72 => 25,  69 => 140,  47 => 12,  40 => 10,  37 => 9,  22 => 2,  246 => 90,  157 => 56,  145 => 46,  139 => 45,  131 => 52,  123 => 47,  120 => 40,  115 => 43,  111 => 37,  108 => 36,  101 => 32,  98 => 31,  96 => 31,  83 => 25,  74 => 46,  66 => 24,  55 => 17,  52 => 21,  50 => 15,  43 => 12,  41 => 5,  35 => 9,  32 => 11,  29 => 6,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 72,  164 => 59,  162 => 57,  154 => 106,  149 => 51,  147 => 101,  144 => 49,  141 => 48,  133 => 55,  130 => 41,  125 => 81,  122 => 43,  116 => 41,  112 => 42,  109 => 53,  106 => 36,  103 => 32,  99 => 31,  95 => 28,  92 => 21,  86 => 28,  82 => 192,  80 => 59,  73 => 19,  64 => 26,  60 => 16,  57 => 11,  54 => 10,  51 => 13,  48 => 22,  45 => 17,  42 => 7,  39 => 10,  36 => 5,  33 => 10,  30 => 7,);
    }
}
