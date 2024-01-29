/*Enc uando carge la app se ejecutara */
$(document).ready(function () {
    fetchTask();
    /*Condicional para el UPDATE*/
    let edit = false;



    /*Capturar teclas del usuario del input search*/
    /*Al teclear se ira buscando*/
    $("#search").keyup(function () {

        fetchTask();

        /*Validar que el servidor regrese algo*/
        if ($("#search").val()) {
            let search = $("#search").val();
            /*Uso de AJAX por objeto*/
            $.ajax({
                url: "php/tasksearch.php",
                type: "POST",
                data: { search },
                success: function (response) {
                    let tasks = JSON.parse(response);

                    let template = "";
                    tasks.forEach(task => {
                        template += `<li> ${task.name} </li>`
                    });

                    $(`#container`).html(template);
                    $(`#task-result`).show();

                }
            })
        }


    })

    /*Funcion para mostrar las tareas*/
    function fetchTask() {
        $.ajax({
            url: "php/tasklist.php",
            type: "GET",
            success: function (response) {
                let tasks = JSON.parse(response);
                let template = "";
                tasks.forEach(task => {
                    template += `<tr taskid="${task.id}">
                        <td>${task.id}</td>
                        <td>
                            <a href="#" class="task-item">${task.name}</a>
                        </td>
                        <td>${task.description}</td>
                        <td>
                            <input type="button" id="delete" value="Borrar" class="task-delete btn btn-danger">
                        </td>
                    </tr>`;
                });
                $("#task").html(template);
            }
        });
    }

    /*Se lee el evento de el elemento save*/
    $("#save").click(function (e) {
        let id = $('#taskID').val();
        let name = $('#name').val();
        let description = $('#description').val();
        /*En caso de estar actualizando el valor de una tarea de comprobara la variable "edit" */
        let url = edit === false ? "php/taskadd.php" : "php/task-edit.php";
        
        $.ajax({
            url: url,
            type: "POST",
            data: { id, name, description },
            success: function (response) {
                fetchTask();
                $("#task-form").trigger("reset");
                console.log(response);
            }
        })
        /*Se captura la funcion del evento del submit para prevenir la espera de un html*/
        e.preventDefault();
        /*En caso de actualizar se regresa el valor a false */
        edit = false;

    })


    /*Se captura la funcion del evento del submit borrar*/
    $(document).on('click', '#delete', function () {
        if (confirm("Confirme que desea proceder con la eliminación de la tarea")) {

            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('taskid');
            $.post('php/task-delete.php', { id: id }, function (response) {
                fetchTask();
            })
                .fail(function (error) {
                    console.log('Error en la solicitud AJAX:', error);
                });
        }

    })



    /*Funcion del click en alguna tarea*/
    $(document).on("click", ".task-item", function () {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr("taskid");
        $.post("php/task-update.php", { id: id }, function (response) {
            const task = JSON.parse(response);
            $("#taskID").val(task.id);          
            $("#name").val(task.name);
            $("#description").val(task.description);
            edit = true;

        })
        
    });

});
