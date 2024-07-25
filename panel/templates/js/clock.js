$(document).ready(function() {


    //перепишу на класс
    var element = $(".timer_clock");
    var elementDinner = $(".time_dinner");
    var running = element.data('autostart');
    var hoursElement = element.find('.hours');
    var minutesElement = element.find('.minutes');
    var secondsElement = element.find('.seconds');
    var hoursElementDinner = elementDinner.find('.hours');
    var minutesElementDinner = elementDinner.find('.minutes');
    var secondsElementDinner = elementDinner.find('.seconds');
    var hours, minutes, seconds, timer;
    function timeConverter(UNIX_timestamp){
        var a = new Date(UNIX_timestamp * 1000);
        var date = a.getDate();
        var hour = a.getHours();
        var min = a.getMinutes();
        var sec = a.getSeconds();
        var time =  hour + ':' + min + ':' + sec ;
        return time;
    }
    function prependZero(time, length) {
        time = '' + (time | 0);
        while (time.length < length) time = '0' + time;

        return time;
    }

    function setStopwatch(hours, minutes, seconds,type) {
        if (type =="work"){
            hoursElement.text(prependZero(hours, 2));
            minutesElement.text(prependZero(minutes, 2));
            secondsElement.text(prependZero(seconds, 2));
        }
        if (type =="dinner"){
            hoursElementDinner.text(prependZero(hours, 2));
            minutesElementDinner.text(prependZero(minutes, 2));
            secondsElementDinner.text(prependZero(seconds, 2));
        }
    }

    // Update time in stopwatWch periodically - every 25ms
    function runTimer(time,type) {
        var startTime = Number(time)+"100";
        var prevHours = hours;
        var prevMinutes = minutes;
        var prevSeconds = seconds;

        if(type=="work"){
            timer = setInterval(function () {
                var timeElapsed = Date.now() - startTime;
                hours = (timeElapsed / 3600000) + prevHours;
                minutes = ((timeElapsed / 60000) + prevMinutes) % 60;
                seconds = ((timeElapsed / 1000) + prevSeconds) % 60;
                setStopwatch(hours, minutes, seconds,"work");
            }, 25);
        }
        if(type=="dinner"){
            timer = setInterval(function () {
                var timeElapsed = Date.now() - startTime;
                hours = (timeElapsed / 3600000) + prevHours;
                minutes = ((timeElapsed / 60000) + prevMinutes) % 60;
                seconds = ((timeElapsed / 1000) + prevSeconds) % 60;
                setStopwatch(hours, minutes, seconds,"dinner");
            }, 25);
        }
    }

    // Split out timer functions into functions.
    // Easier to read and write down responsibilities
    function controleTimer(event,clock){
        // if(event == "run"){
        //     run()
        // }
        //  if(event == "stop"){
        //      pause()
        //  }
    }
    function run(time,type) {
        running = true;
        runTimer(time,type);
    }

    function pause() {
        running = false;
        clearTimeout(timer);
    }

    function reset() {
        running = false;
        pause();
        hours = minutes = seconds = milliseconds = 0;
        setStopwatch(hours, minutes, seconds);

    }
    reset();
    if(running) run();
    var monthNames = [ "Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь" ];
    var dayNames= ["Воскресенье","Понедельник","Вторник","Среда","Четверг","Пятница","Суббота"]

    // Создаем объект newDate()
    var newDate = new Date();
    // "Достаем" текущую дату из объекта Date
    newDate.setDate(newDate.getDate());
    // Получаем день недели, день, месяц и годf    // Получаем день недели, день, месяц и год

    setInterval( function() {
        // Создаем объект newDate() и показывает секунды
        var seconds = new Date().getSeconds();
        // Добавляем ноль в начало цифры, которые до 10
        $("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);

    },1000);

    setInterval( function() {
        // Создаем объект newDate() и показывает минутыa
        var minutes = new Date().getMinutes();
        // Добавляем ноль в начало цифры, которые до 10
        $("#min").html(( minutes < 10 ? "0" : "" ) + minutes);

    },1000);

    setInterval( function() {
        // Создаем объект newDate() и показывает часы
        var hours = new Date().getHours();
        // Добавляем ноль в начало цифры, которые до 10
        $("#hours").html(( hours < 10 ? "0" : "" ) + hours);

    }, 1000);



// ШЕДЕВР БУДИЛЬНИКА
    function button(type, event,text,clock){
        $('<button>', {
            text: `${text}`,
            class:`btn ${type}`,
            on: {
                click: function(){
                    ajaxClock(`${event}`)
                },
            }
        }).appendTo('#dropdown-btn');
    }
    function ajaxClock(event){
        $("#dropdown-btn button").remove();
        var userid = $(".dropdown-menu").attr("userID-id")
        jQuery.ajax({
            type: "POST",
            url: "core/core.php",
            data: {
                "status": `${event}`,
                "userID": userid,
            },
            success: function(html) {
                let array = JSON.parse(html)
                if(array== null){
                    $("#daystatus").text("Первый рабочий день")
                    statusNow(array);
                }else{
                    reset()
                    if (array.activity =="startday" || array.activity=="continue-work"){
                        $("#daystatus").text("Работаю")
                        $(".header-clock").removeClass("header-clock--animate-color-yellow")
                        $(".header-clock").removeClass("header-clock--animate-color-green")
                    }
                    if (array.activity=="endday"){
                        $("#daystatus").text("Завершен")
                        $(".header-clock").removeClass("header-clock--animate-color-yellow").addClass("header-clock--animate-color-green")
                    }
                    if (array.activity=="dinner"){
                        $("#daystatus").text("Обед")
                        $(".header-clock").removeClass("header-clock--animate-color-green").addClass("header-clock--animate-color-yellow")
                    }
                    statusNow(array.activity,array);
                }

            }
        });

    }
    function statusNow(status,array){

        if(array == null ){
            button("btn-success","startday","Начать первый рабочий день");
        }
        if(status=="endday"){
            reset()
            $(".time_dinner").hide();
            let startTime = Number(array.time_exit)+"100";
            let prevHours = hours;
            let prevMinutes = minutes;
            let prevSeconds = seconds;
            let timeElapsed = startTime-(Number(array.time_now)+"100");
            hours = (timeElapsed / 3600000) + prevHours;
            minutes = ((timeElapsed / 60000) + prevMinutes) % 60;
            seconds = ((timeElapsed / 1000) + prevSeconds) % 60;
            hoursElement.text(prependZero(hours, 2));
            minutesElement.text(prependZero(minutes, 2));
            secondsElement.text(prependZero(seconds, 2));
            button("btn-success","startday","Начать рабочий день","run");

        }
        if(status== "startday"){
            reset()
            run(array.time_now,"work")
            button("btn-danger","endday","Завершить рабочий день","stop");
            button("btn-warning","dinner","Обед");
        }
        if( status == "continue-work"){
            reset()

            run(array.time_now,"work")
            $(".time_dinner").hide()
            button("btn-danger","endday","Завершить рабочий день","stop");
            button("btn-warning","dinner","Обед");
        }
        if(status== "dinner"){
            reset()
            $(".time_dinner").show();
            let startTime = Number(array.time_nowdinner)+"100";
            let prevHours = hours;
            let prevMinutes = minutes;
            let prevSeconds = seconds;
            let timeElapsed = startTime-(Number(array.time_now)+"100") ;
            hours = (timeElapsed / 3600000) + prevHours;
            minutes = ((timeElapsed / 60000) + prevMinutes) % 60;
            seconds = ((timeElapsed / 1000) + prevSeconds) % 60;
            hoursElement.text(prependZero(hours, 2));
            minutesElement.text(prependZero(minutes, 2));
            secondsElement.text(prependZero(seconds, 2));
            run(array.time_nowdinner,"dinner")
            button("btn-danger","endday","Завершить рабочий день");
            button("btn-success","continue-work","Продолжить рабочий день");
        }
    }
    $("#dropdownMenuLink").click(function () {
        $("#dropdown-btn button").remove();
        reset()
        ajaxClock("statusNow")
    })
});