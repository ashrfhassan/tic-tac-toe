var currentMatchID = null;
var currentState = null;
var player1Name = null;
var player2Name = null;
var player1Symbol = null;
var player2Symbol = null;
var lastPlayedSymbol = null;

function startMatch() {
    player1Name = $('#p1-name').val();
    player2Name = $('#p2-name').val();
    player1Symbol = "X";
    player2Symbol = "O";
    $.ajax({
        type: "POST",
        url: apiUrl + "startnewmatch",
        data: {
            p1Name: player1Name,
            p2Name: player2Name
        },
        success: function (res) {
            res = JSON.parse(res);
            currentMatchID = res.data.match_id;
            currentState = res.data.currentState;
            $('#player-name-turn').text(player1Name);
            $('#player-symbol-turn').text(player1Symbol);
            $('#startSection').addClass('d-none');
            $('#gameSection').removeClass('d-none');
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert("something went wrong!");
        }
    });
}

function makeMove(squareNumber) {
    var currentSymbol = null;
    var currentPlayer = null;
    var nextPlayer = null;
    var nextSymbol = null;
    var isEnd = true;
    if (lastPlayedSymbol == null || lastPlayedSymbol === player2Symbol) {
        currentSymbol = player1Symbol;
        currentPlayer = player1Name;
        nextPlayer = player2Name;
        nextSymbol = player2Symbol;
    } else {
        currentSymbol = player2Symbol;
        currentPlayer = player2Name;
        nextPlayer = player1Name;
        nextSymbol = player1Symbol;
    }
    lastPlayedSymbol = currentSymbol;
    $.ajax({
        type: "POST",
        url: apiUrl + "makemove",
        data: {
            currentState:currentState,
            squareNumber: squareNumber,
            symbol: currentSymbol,
            matchID:currentMatchID,
            pName:currentPlayer
        },
        success: function (res) {
            res = JSON.parse(res);
            $('#' + squareNumber).text(currentSymbol);
            $('#' + squareNumber).css('cursor', 'default');
            $('#' + squareNumber).unbind('click');
            $('#player-name-turn').text(nextPlayer);
            $('#player-symbol-turn').text(nextSymbol);
            $('td').each(function () {
                if ($(this).text() === "")
                    isEnd = false;
            });
            currentState = res.data.currentState;
            if (res.data.winner) {
                $('#winner-name').text(res.data.winner.name);
                $('#gameSection').addClass('d-none');
                $('#winnerSection').removeClass('d-none');
            }
            if (isEnd) {
                if (res.data.winner)
                    $('#winner-name').text(res.data.winner);
                else
                    $('#winner-name').text("No one");
                $('#gameSection').addClass('d-none');
                $('#winnerSection').removeClass('d-none');
            }

        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert("something went wrong!");
        }
    });
}


$(document).ready(function () {
    $('.btn-success').on('click', function () {
        startMatch();
    });

    $('.btn-warning').on('click', function () {
        window.location.reload();
    });

    $('td').on('click', function () {
        makeMove($(this).data('snumber'));
    });
});