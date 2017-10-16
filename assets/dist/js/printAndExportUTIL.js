    

$("#btn-print").click(function () {

             var tripData = [];
            $.each($("input:checkbox:not(:checked)"), function(){            
              dat="."+$(this).val();
              $(dat).hide();
            });
            $(".l").hide();
            $(".p").print();
            $.each($("input:checkbox:not(:checked)"), function(){            
              dat="."+$(this).val();
              $(dat).show();
            });
            $(".l").show();
            $(".col1").show();
        });


  $("#btnExport").click(function(e) {
               
    e.preventDefault();

    //getting data from our table
    var data_type = 'data:application/vnd.ms-excel';
/*    var table_div = document.getElementById('table_wrapper');
    var table_html = table_div.outerHTML.replace(/ /g, '%20');*/

    var checks=[];
    $.each($("input:checkbox:checked"), function(){            
              checks.push($(this).val().replace('col',''));
            });
    var j=checks.length;
    if(j%2!=0)
      j=j+1;
       // alert(j);

    var table_prep='<table><thead><tr><td%20style="font-size:24px;font-weight:bold;text-align:center"%20colspan="'+j+'">Virk Logistics</td></tr><tr></tr><tr%20style="font-weight:bold">';
    //alert(table_div.innerHTML.replace(/ /g, '%20'));
    

    var headers = [];
    var table = $('#list').get(0);
    for (var i=0; i<table.rows[1].cells.length; i++) {

          $.each(checks, function(key, value ){            
              if(value==i+1){
                table_prep +="<td>"+table.rows[1].cells[i].innerHTML.replace(/ /gi,'')+"</td>";
              }
            });
    }
    table_prep +="</tr></thead><tbody>";

    //alert(table_prep);

    for (var i=2; i<table.rows.length; i++) {
      table_prep +='<tr>';
        var tableRow = table.rows[i];
        var rowData = {};

        for (var j=0; j<tableRow.cells.length; j++) {
          //alert(tableRow.cells[j].outerHTML);
           $.each(checks, function(key, value ){           
           var c=tableRow.cells[j].className.replace('col','') 
              if(value==c){
                //alert(tableRow.cells[j].rowSpan);
                table_prep +="<td%20rowspan='"+tableRow.cells[j].rowSpan+"'>"+tableRow.cells[j].innerHTML.replace(/ /gi,'')+"</td>";
              }
            });
            

        }

        table_prep +="</tr>"
    } 
    table_prep +="</tbody></table>";
//alert(table_prep);

//var table_html = table_prep.outerHTML.replace(/ /g, '%20');


    var a = document.createElement('a');
    a.href = data_type + ', ' + table_prep;
    a.download = 'exported_table_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
    a.click();
  });
 


    $(function(){
         var doc = new jsPDF();

    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

   $('#btnExportpdf').click(function () {

        var table = $('#list').get(0);
        var checks=[]
        var data = [];
        $.each($("input:checkbox:checked"), function(){            
              checks.push($(this).val().replace('col',''));
            });
    // first row needs to be headers
    var headers = [];
    for (var i=0; i<table.rows[1].cells.length; i++) {

          $.each(checks, function(key, value ){            
              if(value==i+1){
                      headers[i] = table.rows[1].cells[i].innerHTML.replace(/ /gi,'');
//Usama



// end usama
              }
            });
    }


    // go through cells
    for (var i=2; i<table.rows.length; i++) {

        var tableRow = table.rows[i];
        var rowData = [];
        var skip=false;
        var k=0;
        for (var j=0; j<tableRow.cells.length; j++) {
          //alert(tableRow.cells[j].outerHTML);
          if(tableRow.cells[j].className.replace('col','')!="2" && k=="1")
          {
                            rowData[ k ] = "";
                
                j=j-1;

          }

              else{
                                rowData[ k ] = tableRow.cells[j];    
              }
              k=k+1;
        }

        data.push(rowData);
    }

    var doc = new jsPDF('l','pt', 'letter', true);
        doc.text(350, 40, "Virk Logistics\n\n\n"+document.title);
        doc.cellInitialize();
        doc.setFontSize(8);
doc.autoTable(headers,data,{
    startY: 120,
    margin:30,
    rowWidth: 'auto',
    columnWidth: 'auto',
    styles: {
      overflow: 'linebreak',
      fontSize: 8,
      halign: 'left', // left, center, right
    valign: 'middle', // top, middle, bottom
    
    },
    columnStyles: {
      4:{cellPadding: 0}
    }
  });
doc.output('datauri');
doc.save('sample-file.pdf');
        });
});
