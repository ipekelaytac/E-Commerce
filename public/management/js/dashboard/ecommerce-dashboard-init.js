// $(function () {
//     // $(document).ready(function () {
//     //     setTimeout(function () {
//     //         toastr.options = {
//     //             positionClass: "toast-top-right",
//     //             closeButton: true,
//     //             progressBar: true,
//     //             showMethod: "slideDown",
//     //             timeOut: 5000
//     //         };
//     //         toastr.info("Multipurpose Admin Template", "Hi, welcome to Metrical")
//     //     }, 300)
//     // });
//     var d = {
//         chart: {
//             type: "bar",
//             height: 50,
//             fontFamily: "IBM Plex Sans, sans-serif",
//             foreColor: "#6780B1",
//             sparkline: {enabled: true}
//         },
//         plotOptions: {bar: {columnWidth: "25%"}},
//         series: [{data: [25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54, 25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54, 25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54, 25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54]}],
//         labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
//         xaxis: {crosshairs: {width: 1},},
//         colors: ["#F73126"],
//         tooltip: {
//             fixed: {enabled: false}, x: {show: false}, y: {
//                 title: {
//                     formatter: function (f) {
//                         return ""
//                     }
//                 }
//             }, marker: {show: false}
//         }
//     };
//     new ApexCharts(document.querySelector("#countChart1"), d).render();
//     var b = {
//         chart: {
//             type: "bar",
//             height: 50,
//             fontFamily: "IBM Plex Sans, sans-serif",
//             foreColor: "#6780B1",
//             sparkline: {enabled: true}
//         },
//         plotOptions: {bar: {columnWidth: "25%"}},
//         series: [{data: [25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54, 25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54, 25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54, 25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54]}],
//         labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
//         xaxis: {crosshairs: {width: 1},},
//         colors: ["#63CF72"],
//         tooltip: {
//             fixed: {enabled: false}, x: {show: false}, y: {
//                 title: {
//                     formatter: function (f) {
//                         return ""
//                     }
//                 }
//             }, marker: {show: false}
//         }
//     };
//     new ApexCharts(document.querySelector("#countChart2"), b).render();
//     var a = {
//         chart: {
//             type: "bar",
//             height: 50,
//             fontFamily: "IBM Plex Sans, sans-serif",
//             foreColor: "#6780B1",
//             sparkline: {enabled: true}
//         },
//         plotOptions: {bar: {columnWidth: "25%"}},
//         series: [{data: [25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54, 25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54, 25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54, 25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54]}],
//         labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
//         xaxis: {crosshairs: {width: 1},},
//         colors: ["#5D78FF"],
//         tooltip: {
//             fixed: {enabled: false}, x: {show: false}, y: {
//                 title: {
//                     formatter: function (f) {
//                         return ""
//                     }
//                 }
//             }, marker: {show: false}
//         }
//     };
//     new ApexCharts(document.querySelector("#countChart3"), a).render();
//     e.render()
// });
// $(function () {
//     'use strict';
//     /////////////////////////////////////////////
//     // Bar Chart
//     /////////////////////////////////////////////
//
//     // Bar Chart 1
//     $.plot("#flotBar1", [{
//         data: [
//             //  sağ kazanç sol blok aralığı
//             [0, 3],
//             [2, 8],
//             [4, 5],
//             [6, 13],
//             [8, 5],
//             [10, 7],
//             [12, 4],
//             [14, 6],
//             [16, 7],
//             [18, 10]
//         ]
//     }], {
//         series: {
//             bars: {
//                 show: true,
//                 lineWidth: 0,
//                 fillColor: '#5D78FF'
//             }
//
//         },
//         grid: {
//             borderWidth: 1,
//             borderColor: '#D9D9D9'
//         },
//         yaxis: {
//             tickColor: '#d9d9d9',
//             font: {
//                 color: '#666',
//                 size: 10
//             }
//         },
//         xaxis: {
//             tickColor: '#d9d9d9',
//             font: {
//                 color: '#666',
//                 size: 10
//             }
//         }
//     });
//
//     /////////////////////////////////////////////
//     // Pie Chart
//     /////////////////////////////////////////////
//
//
//     var piedata = [{
//         label: "Kategoriler 1",
//         data: [
//             [1, 80]
//         ],
//         color: '#5D78FF'
//     },
//         {
//             label: "Kategoriler 2",
//             data: [
//                 [1, 50]
//             ],
//             color: '#C9D5FA'
//         },
//         {
//             label: "Kategoriler 3",
//             data: [
//                 [1, 90]
//             ],
//             color: '#63CF72'
//         },
//         {
//             label: "Kategoriler 4",
//             data: [
//                 [1, 80]
//             ],
//             color: '#FABA66'
//         },
//         {
//             label: "Kategoriler 5",
//             data: [
//                 [1, 80]
//             ],
//             color: '#EE8CE5'
//         }
//     ];
//
//     // Pie Chart 1
//     $.plot('#flotPie1', piedata, {
//         series: {
//             pie: {
//                 show: true,
//                 radius: 1,
//                 label: {
//                     show: true,
//                     radius: 2 / 3,
//                     formatter: labelFormatter,
//                     threshold: 0.1
//                 }
//             }
//         },
//         grid: {
//             hoverable: true,
//             clickable: true
//         }
//     });
//
//     function labelFormatter(label, series) {
//         return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
//     }
//
// });
