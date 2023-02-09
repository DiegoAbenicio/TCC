<?php echo $__env->make('agenda/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<!DOCTYPE html>
<html>
<head>

    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.5/dist/locale-all.min.js"></script>


    <style>
        #dialog{
            display:none;
        }

    </style>

</head>
<body>

    <div id="calendar" ></div>
    <div id="dialog" class="card shadow mb-4 bg-white">
        <div id="dialog-body">
            <form id="dayClick" method="post" action="<?php echo e(route('store')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label>Nome do Animal</label>
                    <input type="search" input list="animals" id="animal_name" class="form-control" name="animal_name" placeholder="Insira o nome do Animal" required autocomplete="off">
                    <input type="hidden" id="animal_id" name="animal_id">
                    <datalist id="animals">
                        <?php $__currentLoopData = $animal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option data-id="<?php echo e($value->id); ?>"><?php echo e($value->nome); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </datalist>
                    <script>
                        let animalName = document.querySelector('#animal_name');
                        let animalId = document.querySelector('#animal_id');
                        let animals = document.querySelector('#animals');

                        animalName.addEventListener('input', function() {
                            let options = animals.querySelectorAll('option');
                            for (let i = 0; i < options.length; i++) {
                                let option = options[i];
                                let optionValue = option.innerHTML;
                                if (optionValue.toLowerCase().startsWith(this.value.toLowerCase())) {
                                    option.style.display = 'block';
                                } else {
                                    option.style.display = 'none';
                                }
                            }
                        });

                        animalName.addEventListener('change', function() {
                            let options = animals.querySelectorAll('option');
                            for (let i = 0; i < options.length; i++) {
                                let option = options[i];
                                let optionValue = option.innerHTML;
                                if (optionValue === this.value) {
                                    animalId.value = option.getAttribute('data-id');
                                    break;
                                }
                            }
                        });
                    </script>
                </div>

                <div class="form-group">
                    <label>Nome do Evento</label>
                    <input type="search" input list="eventos" id="evento_name" class="form-control" name="evento_name" placeholder="Insira o nome do Evento" required autocomplete="off">
                    <input type="hidden" id="evento_id" name="evento_id">
                    <datalist id="eventos">
                        <?php $__currentLoopData = $servicos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option data-id="<?php echo e($value->id); ?>"><?php echo e($value->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </datalist>
                    <script>
                        let eventoName = document.querySelector('#evento_name');
                        let eventoId = document.querySelector('#evento_id');
                        let eventos = document.querySelector('#eventos');

                        eventoName.addEventListener('input', function() {
                            let options = eventos.querySelectorAll('option');
                            for (let i = 0; i < options.length; i++) {
                                let option = options[i];
                                let optionValue = option.innerHTML;
                                if (optionValue.toLowerCase().startsWith(this.value.toLowerCase())) {
                                    option.style.display = 'block';
                                } else {
                                    option.style.display = 'none';
                                }
                            }
                        });

                        eventoName.addEventListener('change', function() {
                            let options = eventos.querySelectorAll('option');
                            for (let i = 0; i < options.length; i++) {
                                let option = options[i];
                                let optionValue = option.innerHTML;
                                if (optionValue === this.value) {
                                    eventoId.value = option.getAttribute('data-id');
                                    break;
                                }
                            }
                        });
                    </script>
                </div>


                <div class="form-group">
                    <label>Título</label>
                    <div class="form-row">
                        <div class="form-group col-md-7">
                            <input type="text" id="title" class="form-control" name="title" placeholder="Insira o título do evento" required>
                        </div>
                        <div class="form-group col-md-5">
                            <button type="button" id="gerarnome" class="form-control">Gerar nome sugerido</button>
                        </div>
                    </div>
                </div>
                <script>
                document.getElementById('gerarnome').addEventListener('click', function() {
                    var animalName = document.querySelector('#animal_name').value;
                    var eventoName = document.querySelector('#evento_name').value;
                    document.getElementById('title').value = eventoName + ' ' + animalName;
                });
                </script>
                </div>

                <div class="form-group">
                    <label>Inicio/Horas</label>
                    <input type="text" id="start" class="form-control" name="start" placeholder="Insira o inicio e a hora" readonly>
                </div>
                <div class="form-group">
                    <label>Fim/Horas</label>
                    <input type="text" id="end" class="form-control" name="end" placeholder="Insira o final e a hora" readonly>
                </div>
                <!--
                <div class="form-group">
                    <label>Dia todo</label>
                    <input type="checkbox" name="allDay" value="1">Dia todo
                    <input type="checkbox" name="AllDay" value="0">Parte do dia
                </div> -->

                <input type="hidden" id="eventId" name="id">
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">
                        Lançar Evento
                    </button>
                </div>
            </form>

        </div>
    </div>

    <script>

        $(document).ready(function() {
            $('#submit').click(function()
            {
                var value = $('#selected').val();
                alert($('#browsers [value="' + value + '"]').data('value'));
            });
        });
    </script>




    <script>

    jQuery(document).ready(function ($) {
        function convert(str){
            const d = new Date(str);
            let month = '' + (d.getMonth() + 1);
            let day = '' + (d.getDate());
            let year= d.getFullYear();
            if(month.lenght < 2) month = '0' + month;
            if(day.lenght < 2) day = '0' + day;
            let hour=''+d.getUTCHours();
            let minutes=''+d.getUTCMinutes();
            let seconds=''+d.getUTCSeconds();
            if(hour.length < 2) hour='0' + hour;
            if(minutes.length < 2) minutes='0' + minutes;
            if(seconds.length < 2) seconds='0' + seconds;

            return [year, month, day].join('-')+' '+[hour,minutes,seconds].join(':');
        }


        var calendar = $('#calendar').fullCalendar({
            locale: 'pt-br',
            selectable: true,
            height: 620,
            editable:true,
            showNonCurrentDates: false,
            defaultView: 'agendaWeek',
            businessHours:{
                start: '08:00',
                end:   '17:00',
            },
            header:{
                left:'prev,next today',
                center:'title',
                right:'agendaWeek,month,agendaDay'
            },
            events:"<?php echo e(route('allEvent')); ?>",
            dayClick:function(date, event, view){
                $('#start').val(convert(date));
                $('#dialog').dialog({
                    title: 'Adicionar Evento',
                    width: 600,
                    height: 600,
                    modal: true,
                    show:{
                        effect:'clip',
                        duration: 350
                    },
                    hide:{
                        effect:'clip',
                        duration: 250
                    }
                })
            },
            select:function(start,end){
                $('#start').val(convert(start));
                $('#end').val(convert(end));
                $('#dialog').dialog({
                    title: 'Adicionar Evento',
                    width: 600,
                    height: 600,
                    modal: true,
                    show:{
                        effect:'clip',
                        duration: 350
                    },
                    hide:{
                        effect:'clip',
                        duration: 250
                    }
                })
            },
            eventClick:function(events){
                $('#title').val(events.title);
                $('#start').val(convert(events.start));
                $('#end').val(convert(events.end));
                $('#animal_id').val(events.animal_id);
                $('#eventId').val(events.id);
                $('#color').val(events.color);
                $('#textColor').val(events.textColor);
                $('#dialog').dialog({
                    title: 'Atualizar Evento',
                    width: 600,
                    height: 600,
                    modal: true,
                    show:{
                        effect:'clip',
                        duration: 350
                    },
                    hide:{
                        effect:'clip',
                        duration: 250
                    }
                });

            },
            eventDrop:function(events){
                $('#title').val(events.title);
                $('#animal_id').val(events.animal_id);
                $('#eventId').val(events.id);
                $('#color').val(events.color);
                $('#textColor').val(events.textColor);
                $('#start').val(convert(events.start));
                $('#end').val(convert(events.end));
                $('#dialog').dialog({
                    title: 'Atualizar Evento',
                    width: 600,
                    height: 600,
                    modal: true,
                    show:{
                        effect:'clip',
                        duration: 350
                    },
                    hide:{
                        effect:'clip',
                        duration: 250
                    }
                });
            },

        });



    });



</script>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</body>
</html>


<?php /**PATH D:\Area de Trabalho\Wallpapers\cadastro\TCC\resources\views/agenda/agenda.blade.php ENDPATH**/ ?>