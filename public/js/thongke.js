function add(event, id) {
    event.preventDefault();
    var url = "";
    if (id == 1) {
        url = "http://localhost:8000/dashboard/thongke/order/complete/" +id
    }
    if (id == 2) {
        url = "http://localhost:8000/dashboard/thongke/order/complete/"+id
    }
    if (id == 3) {
        url = "http://localhost:8000/dashboard/thongke/order/complete/"+id
    }
    if (id == 4) {
        url = "http://localhost:8000/dashboard/thongke/order/complete/"+id
    }
    if (id == 5) {
        url = "http://localhost:8000/dashboard/thongke/order/complete/"+id
    }
    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        data: {
           
        },
        success: function(data) {
            var html = '';
            for (var pro of data) {

                html += '   <tr>',
                    html += '  <td>' + pro.name + '</td>',
                    html += '  <td>' + pro.sdt + '</td>',
                    html += '  <td>' + pro.address + '</td>',
                    html += '  <td>' + pro.note + '</td>',
                    html += '  <td>' + pro.price_order + '</td>',
                    html += '<td> ' + pro.status.name + '</td>',
                    html += ' </tr>'

            }
            $('.all').html(html);
            console.log(data);
        },
        error: function(data) {
            console.log(data);
        }
    })
}
