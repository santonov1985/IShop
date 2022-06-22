$(document).ready(function() {
    $('#theModal').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget);
        var modal = $(this);
        modal.find('.modal-body').load(button.data("remote"));
    });

    $('#theModal').on('hidden.bs.modal', function (e) {
        var modal = $(this);
        modal.find('.modal-body').empty();
    });

    $('.btn-delete').confirm({
        icon: 'fa fa-warning',
        title: 'Удаление!',
        content: 'Вы уверены что хотите удалить?',
        type: 'red',
        buttons: {
            confirm: {
                text: 'Да',
                action: function () {
                    location.href = this.$target.attr('href');
                }
            },
            cancel: {
                text: 'Нет'
            }
        }
    });

    $('.btn-hide').confirm({
        icon: 'fa fa-exclamation-circle',
        title: 'Скрыть!',
        content: 'Вы уверены что хотите скрыть данный элемент?',
        type: 'orange',
        buttons: {
            confirm: {
                text: 'Да',
                action: function () {
                    location.href = this.$target.attr('href');
                }
            },
            cancel: {
                text: 'Нет'
            }
        }
    });

    $('.btn-restore').confirm({
        icon: 'fa fa-warning',
        title: 'Восстановление!',
        content: 'Вы уверены что хотите восстановить?',
        type: 'green',
        buttons: {
            confirm: {
                text: 'Да',
                action: function () {
                    location.href = this.$target.attr('href');
                }
            },
            cancel: {
                text: 'Нет'
            }
        }
    });

    $('.select2').select2({
        placeholder: 'Выберите значение',
        allowClear: true,
        language: {
            noResults: function () {
                return 'Не чего не найдено';
            },
        },
    });

    window.readUrl = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(input).next('img')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200)
                    .attr('style', '  border: 1px solid #ddd;\n' +
                        '  border-radius: 4px;\n' +
                        '  padding: 5px;\n' +
                        '  width: 150px;')
            };

            reader.readAsDataURL(input.files[0]);
        }
    };

    window.deleteThis = function(input) {
        $(`#input_${input.id}`).attr('value','image_deleted');
        var image = $(`<input type=\"text\" name=\"deleted_${input.id}\" value=null hidden/>`);
        $(`#input_${input.id}`).append(image);
        var div = $('#'+input.id);
        if (div.prop('tagName') === 'DIV') {
            div.remove();
        }
    };

    $('#image_delete').click(function () {
        $('#image_input').attr('value','image_deleted');
        var image = $("<input type=\"text\" name=\"image_deleted\" value=null hidden/>");
        $('#image_input').append(image);
        $('#image_source').val(null);
        $('#image').remove();
        $('#image_delete').remove();
    });

    $('#news_tags').select2({
        tags: true,
        tokenSeparators: [",", " "]
    });

    $('#company_tags').select2({
        tags: true,
        tokenSeparators: [","]
    });

    $('.datepicker').datepicker({
        timepicker: false,
        format: 'dd.mm.yyyy',
        autoClose: true,
        language: 'ru'
    });

    $('.phone').inputmask({
        mask : '+7 (999) 999-99-99',
    });

    $('#add_phone').on('click', function (){
        var max_fields      = 10;
        var wrapper         = $(".branch_phone");

        var x = 1;

        if(x < max_fields) {
            x++;
            $(wrapper).append('<div class="mb-3 input-block">' +
                '                                <div class="input-group">\n' +
                '                                        <input id="phone" type="text" class="form-control phone" name="callcenter_phone[]" value="">\n' +
                '                                        <div class="input-group-append">\n' +
                '                                            <button class="btn btn-danger btn-sm remove-element" type="button">\n' +
                '                                                <i class="fa fa-trash"></i>\n' +
                '                                            </button>\n' +
                '                                        </div>\n' +
                '                                    </div>' +
                '                                 </div>'); //add input box
            $(".phone").inputmask("+7 (999) 999-99-99");
        }

        $(wrapper).on('click', '.remove-element', function (e) {
            e.preventDefault();
            $(this).parents('.input-block').remove();
            x--;
        });

    });

    $('.remove-element').on('click', function () {
        var x = parseInt($('#total_chq_max').val());
        x--;
        $(this).parents('.input-block').remove();
        $('#total_chq_max').val(x);
    });

    $('#add_timetable').on('click', function (){
        var index = parseInt($('#total_chq').val()) + 1;
        var wrapper         = $(".branch_timetable");
        var max_fields      = 7;

        var x = parseInt($('#total_chq_max').val());

        if(x < max_fields) {
            x++;

            $(wrapper).append(`<div id='timetable_${index}' class="input-block">
                            <div class="form-group">
                                    <span class="input-group-append">
                                        <input placeholder="Пн - Пт" type="text" name="timetable[${index}][type]" class="form-control" required>
                                        <input placeholder="08:00 - 18:00" type="text" name="timetable[${index}][time]"
                                               class="form-control" required>
                                        <button class="btn btn-danger btn-sm remove-element" type="button">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </span>
                                    </div></div>`);
            $('#total_chq').val(index);
            $('#total_chq_max').val(x);
        }

        $(wrapper).on('click', '.remove-element', function (e) {
            x--;
            e.preventDefault();
            $(this).parents('.input-block').remove();
            $('#total_chq_max').val(x);
        });

    });
});
