
var price = 39; //price
var sc = undefined;
$(document).ready(function() {
    var $cart = $('#selected-seats'), //Sitting Area
        $counter = $('#counter'), //Votes
        $total = $('#total'); //Total money

    sc = $('#seat-map').seatCharts({
        map: [  //Seating chart
            'aaaaaaaaaa_',
            'aaaaaaaaaa_',
            'aaaaaaaaaa_',
            'aaaaaaaaaa_',
            'aaaaaaaaaa_',
            'aaaaaaaaaa_',
            'aaaaaaaaaa_',
            'aaaaaaaaaa_',
            'aaaaaaaaaa_',
            'aaaaaaaaaaa'
        ],
        naming : {
            top : false,
            getLabel : function (character, row, column) {
                return column;
            }
        },
        legend : { //Definition legend
            node : $('#legend'),
            items : [
                [ 'a', 'available',   'Option' ],
                [ 'a', 'unavailable', 'Sold']
            ]
        },
        click: function () { //Click event
            if (this.status() == 'available') { //optional seat
                $('<li>R'+(this.settings.row+1)+' S'+this.settings.label+'</li>')
                    .attr('id', 'cart-item-'+this.settings.id)
                    .data('seatId', this.settings.id)
                    .appendTo($cart);

                $counter.text(sc.find('selected').length+1);
                $total.text(recalculateTotal(sc)+price);

                return 'selected';
            } else if (this.status() == 'selected') { //Checked
                //Update Number
                $counter.text(sc.find('selected').length-1);
                //update totalnum
                $total.text(recalculateTotal(sc)-price);

                //Delete reservation
                $('#cart-item-'+this.settings.id).remove();
                //optional
                return 'available';
            } else if (this.status() == 'unavailable') { //sold
                return 'unavailable';
            } else {
                return this.style();
            }
        }
    });

    $("#movieDates").on('change', function () {
        var selected = $("option:selected", this);
        var sessionID = selected.attr('data-id');
        loadSoldSeats(sessionID);

        changeInfo(selected);
    });

    changeInfo($("#movieDates").find('option:selected'));
    loadSoldSeats($("#movieDates").find('option:selected').attr('data-id'));
});
function loadSoldSeats(sessionID) {
    sc.find('unavailable').status('available');
    sc.find('selected').status('available');
    $('#selected-seats').html('');
    //sc.get(['1_2', '4_4','4_5','6_6','6_7','8_5','8_6','8_7','8_8', '10_1', '10_2']).status('unavailable');
    $.ajax({
        url: '../core/load-seats.php',
        type: 'POST',
        data: { sessionID: sessionID },
        dataType: 'json',
        success: function (response) {
            sc.get(response).status('unavailable');
        }
    });
}

function changeInfo(selected) {
    var selectedSession = selected.attr('value');
    var MovieName = "";
    selectedSession = selectedSession.match(/\S+/g) || [];
    document.getElementById("movieTimeTag").innerHTML = selectedSession[0] + " " + selectedSession[1];
    for(var i = 2 ; i < selectedSession.length ; i++){
        MovieName = MovieName.concat(" " + selectedSession[i]);
    }
    document.getElementById("movieNameTag").innerHTML = MovieName;
}

//sum total money
function recalculateTotal(sc) {
    var total = 0;
    sc.find('selected').each(function () {
        total += price;
    });

    return total;
}

function processPayment() {
    var selected = sc.find('selected').seatIds;
}