$('.search').keyup(function() {
    var text = $('.search').val();
    console.log(text);
    $.ajax({
        type: 'get',
        url: 'http://127.0.0.1:8000/dashboard/product/search',
        data: {
            search: text
        },
        dataType: 'json',
        success: function(data) {
            console.log(data);
            var html = '';
            for (var pro of data) {
                html += '  <tr>',
                    html += ' <th scope="row">',
                    html += '   <label class="control control--checkbox">',
                    html += '      <input type="checkbox" class="check" name="all[]" value="' + pro.id +
                    '" />',
                    html += '      <div class="control__indicator"></div>',
                    html += '   </label>',
                    html += ' </th>',
                    html += ' <td>' + pro.name + '</td>',
                    html += ' <td>' + pro.don_gia + '</td>',
                    html += ' <td>' + pro.khuyen_mai + '</td>',
                    html += ' <td>' + pro.so_luong + '</td>',
                    html += ' <td><img src="http://127.0.0.1:8000/' + pro.avatar_product +
                    '" alt="" width="150px"></td>',
                    html += '<td> ' + pro.id_danhmuc + '</td>',
                    html += ' <td><a href="dashboard/product/edit/ ' + pro.id +
                    '"><i class="far fa-edit"></i></a>|',
                    html += ' <a href="dashboard/product/delete/ ' + pro.id + '"',
                    html += '  <i class="fas fa-trash"></i></a>',
                    html += ' </td>',
                    html += '   </tr>'
            }
            $('.ketqua').html(html);

        }
    })
})