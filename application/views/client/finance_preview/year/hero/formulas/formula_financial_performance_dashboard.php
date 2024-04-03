<script>
    
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];
    var myConfig8 = {
      type: "bar",
      plotarea: {
        adjustLayout: true
      },    
      scaleX: {
        labels: [
          <?php
          foreach ($financial_performance_dashboard['roa'] as $key) {
            echo "'" . $key['tahun'] . "'";
            echo ",";
            ?>
          <?php
          }
            ?>
        ]
      },
      scaleY: {
        format: '%v%',
        label: {
          text: 'Value (%)'
        },
        guide: {
          lineStyle: 'solid'
        },
        tooltip: {
          text: '%v%'
        }
      },
      series: [{
        values: [<?php
          foreach ($financial_performance_dashboard['roa'] as $key) {
            echo "" . $key['value'].",";
          }
            ?>
        ],
        'background-color':'#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>'
      }]
    };
 
    zingchart.render({
      id: 'myChart8',
      data: myConfig8,
      height: "200px"
    });



    var myConfig9 = {
      type: "line",
      plotarea: {
        adjustLayout: true
      },    
      scaleX: {
        label: {
          text: ""
        },
        labels: [
          <?php
          foreach ($financial_performance_dashboard['wcr'] as $key) {
            echo "'" . $key['tahun'] . "'";
            echo ",";
            ?>
          <?php
          }
            ?>],
    item: {
      
      fontSize: '8px',
    },
      },
      series: [{
        values: [<?php
          foreach ($financial_performance_dashboard['wcr'] as $key) {
            echo "" . round($key['value'],1).",";
          }
            ?>], 
        lineColor: "#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>",
        }
      ]
    };
 
    zingchart.render({
      id: 'myChart9',
      data: myConfig9,
      height: "200px"
    });


    var myConfig10 = {
      type: "line",
      plotarea: {
        adjustLayout: true
      },    
      scaleX: {
        label: {
          text: ""
        },
        labels: [
          <?php
          foreach ($financial_performance_dashboard['roe'] as $key) {
            echo "'" . $key['tahun'] . "'";
            echo ",";
            ?>
          <?php
          }
            ?>],
    item: {
      
      fontSize: '8px',
    },
      },
      scaleY: {
        item: {
        fontSize: '0px',
        },
        stroke: false
      },
      series: [{
        values: [<?php
          foreach ($financial_performance_dashboard['roe'] as $key) {
            echo "" . round($key['value'],1).",";
          }
            ?>], 
        lineColor: "#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>",
        }
      ]
    };
 
    zingchart.render({
      id: 'myChart10',
      data: myConfig10,
      height: "200px"
    });

    var myConfig11 = {
      type: "area",
      scaleX: {
        label: {
          text: ""
        },
        labels: [
          <?php
          foreach ($financial_performance_dashboard['der'] as $key) {
            echo "'" . $key['tahun'] . "'";
            echo ",";
            ?>
          <?php
          }
            ?>],
        item: {
        
        fontSize: '8px',
        },
      },
      series: [{
        values: [<?php
          foreach ($financial_performance_dashboard['der'] as $key) {
            echo "" . round($key['value'],1).",";
          }
            ?>], 
        lineColor: 'red',
        'background-color': "#8a8ef5 #<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>",
        'alpha-area':1,
        }
      ]
    };
 
    zingchart.render({
      id: 'myChart11',
      data: myConfig11,
      height: "200px",
      padding: "0px",
    });
    
    // ==== BREAKDOWNS1 ====

    var breakdowns1 = {
      type: "bar",
      plotarea: {
        adjustLayout: true
      },    
      scaleX: {
        label: {
          text: ""
        }, labels :[
          <?php
          foreach ($financial_performance_dashboard['total_aset'] as $key) {
            echo "'" . $key['tahun'] . "'";
            echo ",";
            ?>
          <?php
          }
            ?>],
        item: {
      
      fontSize: '7px',
    },
      },
      scaleY: {
        item: {
        fontSize: '0px',
        },
        stroke: false
      },
      series: [{
        values: [<?php
          foreach ($financial_performance_dashboard['total_aset'] as $key) {
            echo "" . round($key['value'],1).",";
          }
            ?>],
        'background-color': "#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>",
    
        }
      ]
    };
    zingchart.render({
      id: 'breakdowns1',
      data: breakdowns1,
      height: "110px"
    });
     
    // ==== BREAKDOWNS2 ====

    var breakdowns2 = {
      type: "bar",
      plotarea: {
        adjustLayout: true
      },    
      scaleX: {
        label: {
          text: ""
        },
        labels: [<?php
          foreach ($financial_performance_dashboard['current_aset'] as $key) {
            echo "'" . $key['tahun'] . "'";
            echo ",";
            ?>
          <?php
          }
            ?>],
        item: {
      
      fontSize: '7px',
    },
      },
      scaleY: {
        item: {
        fontSize: '0px',
        },
        stroke: false
      },
      series: [{
        values: [<?php
          foreach ($financial_performance_dashboard['current_aset'] as $key) {
            echo $key['value'] .",";
            ?>
          <?php
          }
            ?>],
        'background-color': "#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>",
    
        }
      ]
    };
    zingchart.render({
      id: 'breakdowns2',
      data: breakdowns2,
      height: "110px"
    });
     
     // ==== BREAKDOWNS3 ====
 
     var breakdowns3 = {
       type: "bar",
       plotarea: {
         adjustLayout: true
       },    
       scaleX: {
         label: {
           text: ""
         },
         labels: [<?php 
          foreach ($financial_performance_dashboard['cash'] as $key) {
            echo "'" . $key['tahun'] . "'";
            echo ",";
            ?>
          <?php
          }
            ?>],
         item: {
       
       fontSize: '7px',
     },
       },
       scaleY: {
         item: {
         fontSize: '0px',
         },
         stroke: false
       },
       series: [{
         values: [<?php
          foreach ($financial_performance_dashboard['cash'] as $key) {
            echo $key['value'] . ",";
            ?>
          <?php
          }
            ?>],
         'background-color': "#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>",
    
         }
       ]
     };
     zingchart.render({
       id: 'breakdowns3',
       data: breakdowns3,
       height: "110px"
     });
     
     // ==== BREAKDOWNS4 ====
 
     var breakdowns4 = {
       type: "bar",
       plotarea: {
         adjustLayout: true
       },    
       scaleX: {
         label: {
           text: ""
         },
         labels: [<?php
          foreach ($financial_performance_dashboard['a_receivable'] as $key) {
            echo "'" . $key['tahun'] . "'";
            echo ",";
            ?>
          <?php
          }
            ?>],
         item: {
       
       fontSize: '7px',
     },
       },
       scaleY: {
         item: {
         fontSize: '0px',
         },
         stroke: false
       },
       series: [{
         values: [<?php
          foreach ($financial_performance_dashboard['a_receivable'] as $key) {
            echo $key['value'] . ",";
            ?>
          <?php
          }
            ?>],
         'background-color': "#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>",
    
         }
       ]
     };
     zingchart.render({
       id: 'breakdowns4',
       data: breakdowns4,
       height: "110px"
     });
     
     // ==== BREAKDOWNS5 ====
 
     var breakdowns5 = {
       type: "bar",
       plotarea: {
         adjustLayout: true
       },    
       scaleX: {
         label: {
           text: ""
         },
         labels: [<?php
          foreach ($financial_performance_dashboard['inventory'] as $key) {
            echo "'" . $key['tahun'] . "'";
            echo ",";
            ?>
          <?php
          }
            ?>],
         item: {
       
       fontSize: '7px',
     },
       },
       scaleY: {
         item: {
          fontSize: '0px',
         },
         stroke: false
       },
       series: [{
         values: [<?php
          foreach ($financial_performance_dashboard['inventory'] as $key) {
            echo $key['value'] . ",";
            ?>
          <?php
          }
            ?>],
         'background-color': "#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>",
    
         }
       ]
     };
     zingchart.render({
       id: 'breakdowns5',
       data: breakdowns5,
       height: "110px"
     });
     
     // ==== BREAKDOWNS6 ====
 
     var breakdowns6 = {
       type: "bar",
       plotarea: {
         adjustLayout: true
       },    
       scaleX: {
         label: {
           text: ""
         },
         labels: [<?php
          foreach ($financial_performance_dashboard['long_term_asset'] as $key) {
            echo "'" . $key['tahun'] . "'";
            echo ",";
            ?>
          <?php
          }
            ?>],
         item: {
       
       fontSize: '7px',
     },
       },
       scaleY: {
         item: {
         fontSize: '0px',
         },
         stroke: false
       },
       series: [{
         values: [<?php
          foreach ($financial_performance_dashboard['long_term_asset'] as $key) {
            echo $key['value'] . ",";
            ?>
          <?php
          }
            ?>],
         'background-color': "#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>",
    
         }
       ]
     };
     zingchart.render({
       id: 'breakdowns6',
       data: breakdowns6,
       height: "110px"
     });
     
     // ==== BREAKDOWNS7 ====
 
     var breakdowns7 = {
       type: "bar",
       plotarea: {
         adjustLayout: true
       },    
       scaleX: {
         label: {
           text: ""
         },
         labels: [<?php
          foreach ($financial_performance_dashboard['t_liabilities'] as $key) {
            echo "'" . $key['tahun'] . "'";
            echo ",";
            ?>
          <?php
          }
            ?>],
         item: {
       
       fontSize: '7px',
     },
       },
       scaleY: {
         item: {
         fontSize: '0px',
         },
         stroke: false
       },
       series: [{
         values: [<?php
          foreach ($financial_performance_dashboard['t_liabilities'] as $key) {
            echo  $key['value'] . ",";
            ?>
          <?php
          }
            ?>],
         'background-color': "#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>",
    
         }
       ]
     };
     zingchart.render({
       id: 'breakdowns7',
       data: breakdowns7,
       height: "110px"
     });
     
     // ==== BREAKDOWNS8 ====
 
     
     var breakdowns8 = {
       type: "bar",
       plotarea: {
         adjustLayout: true
       },    
       scaleX: {
         label: {
           text: ""
         },
         labels: [<?php
          foreach ($financial_performance_dashboard['current_liabilities'] as $key) {
            echo "'" . $key['tahun'] . "'";
            echo ",";
            ?>
          <?php
          }
            ?>],
         item: {
       
       fontSize: '7px',
     },
       },
       scaleY: {
         item: {
         fontSize: '0px',
         },
         stroke: false
       },
       series: [{
         values: [<?php
          foreach ($financial_performance_dashboard['current_liabilities'] as $key) {
            echo $key['value'] . ",";
            ?>
          <?php
          }
            ?>],
         'background-color': "#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>",
    
         }
       ]
     };
     zingchart.render({
       id: 'breakdowns8',
       data: breakdowns8,
       height: "110px"
     });
     
     // ==== BREAKDOWNS9 ====
 
     var breakdowns9 = {
       type: "bar",
       plotarea: {
         adjustLayout: true
       },    
       scaleX: {
         label: {
           text: ""
         },
         labels: [<?php
          foreach ($financial_performance_dashboard['account_payable'] as $key) {
            echo "'" . $key['tahun'] . "'";
            echo ",";
            ?>
          <?php
          }
            ?>],
         item: {
       
       fontSize: '7px',
     },
       },
       scaleY: {
         item: {
         fontSize: '0px',
         },
         stroke: false
       },
       series: [{
         values: [<?php
          foreach ($financial_performance_dashboard['account_payable'] as $key) {
            echo $key['value'] . ",";
            ?>
          <?php
          }
            ?>],
         'background-color': "#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>",
    
         }
       ]
     };
     zingchart.render({
       id: 'breakdowns9',
       data: breakdowns9,
       height: "110px"
     });
     
     // ==== BREAKDOWNS10 ====
 
     var breakdowns10 = {
       type: "bar",
       plotarea: {
         adjustLayout: true
       },    
       scaleX: {
         label: {
           text: ""
         },
         labels: [<?php
          foreach ($financial_performance_dashboard['other_liabilities'] as $key) {
            echo "'" . $key['tahun'] . "'";
            echo ",";
            ?>
          <?php
          }
            ?>],
         item: {
       
       fontSize: '7px',
     },
       },
       scaleY: {
         item: {
         fontSize: '0px',
         },
         stroke: false
       },
       series: [{
         values: [<?php
          foreach ($financial_performance_dashboard['other_liabilities'] as $key) {
            echo $key['value'] . ",";
            ?>
          <?php
          }
            ?>],
         'background-color': "#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>",
    
         }
       ]
     };
     zingchart.render({
       id: 'breakdowns10',
       data: breakdowns10,
       height: "110px"
     });
     
     // ==== BREAKDOWNS11 ====
 
     var breakdowns11 = {
       type: "bar",
       plotarea: {
         adjustLayout: true
       },    
       scaleX: {
         label: {
           text: ""
         },
         labels: [<?php
          foreach ($financial_performance_dashboard['shareholder_equity'] as $key) {
            echo "'" . $key['tahun'] . "'";
            echo ",";
            ?>
          <?php
          }
            ?>],
         item: {
       
       fontSize: '7px',
     },
       },
       scaleY: {
         item: {
         fontSize: '0px',
         },
         stroke: false
       },
       series: [{
         values: [<?php
          foreach ($financial_performance_dashboard['shareholder_equity'] as $key) {
            echo $key['value'] . ",";
            ?>
          <?php
          }
            ?>],
         'background-color': "#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>",
    
         }
       ]
     };
     zingchart.render({
       id: 'breakdowns11',
       data: breakdowns11,
       height: "110px"
     });
     
     // ==== BREAKDOWNS12 ====
 
     var breakdowns12 = {
       type: "bar",
       plotarea: {
         adjustLayout: true
       },    
       scaleX: {
         label: {
           text: ""
         },
         labels: [<?php
          foreach ($financial_performance_dashboard['common_stock'] as $key) {
            echo "'" . $key['tahun'] . "'";
            echo ",";
            ?>
          <?php
          }
            ?>],
         item: {
       
       fontSize: '7px',
     },
       },
       scaleY: {
         item: {
         fontSize: '0px',
         },
         stroke: false
       },
       series: [{
         values: [<?php
          foreach ($financial_performance_dashboard['common_stock'] as $key) {
            echo $key['value'] . ",";
            ?>
          <?php
          }
            ?>],
         'background-color': "#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>",
    
         }
       ]
     };
     zingchart.render({
       id: 'breakdowns12',
       data: breakdowns12,
       height: "110px"
     });
     
     // ==== BREAKDOWNS13 ====
     var breakdowns13 = {
  type: "bar",
  plotarea: {
    adjustLayout: true
  },
  scaleX: {
    label: {
      text: ""
    },
    labels: [<?php
          foreach ($financial_performance_dashboard['current_earnings'] as $key) {
            echo "'" . $key['tahun'] . "'";
            echo ",";
            ?>
          <?php
          }
            ?>],
    item: {
      fontSize: '7px',
    },
  },
  scaleY: {
    item: {
      fontSize: '0px',
    }, 
    stroke: false
  },
  series: [{
    values: [<?php
          foreach ($financial_performance_dashboard['current_earnings'] as $key) {
            echo $key['value'] . ",";
            ?>
          <?php
          }
            ?>],
    'background-color': "#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>",
    
  }]
};

zingchart.render({
  id: 'breakdowns13',
  data: breakdowns13,
  height: "110px"
});


</script>