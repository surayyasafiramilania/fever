<?php

function gender($x){
    if($x == 1){
        return 'Laki-Laki';
    }
    else {
        return 'Perempuan';
    }
}

function gejala($x){
    if($x == 1){
        return 'Ya';
    }
    else {
        return 'Tidak';
    }
}
function role($x){
    if($x == 1){
        return 'Admin';
    }
    else {
        return 'User';
    }
}