<?php

/*
 * Parametros de conexión a la DB
 */

// DATOS DE CONEXION DEL CLIENTE
date_default_timezone_set('America/Tegucigalpa');

const SERVERURL = 'http://localhost/devpatolab/';
const SERVEREMPRESA = 'Patolab';
const SERVER = 'localhost';
const DB = 'clinicarehn_patolab';
const USER = 'clinicarehn_clinicare';
const PASS = 'Clin1c@r32022#';
const PRODUCT_PATH = '/devpatolab/php/atencion_pacientes/Examenes/';

// DATOS DE CONEXION SERVIDOR PRINCIPAL
const SERVER_MAIN = 'localhost';
const DB_MAIN = 'clinicarehn_clinicare';
const USER_MAIN = 'clinicarehn_clinicare';
const PASS_MAIN = 'Clin1c@r32022#%.';

/*
 * Para encrptar y Desencriptar
 * Nota: Estos valores no se deben cambiar, si hay datos en la DB
 */
const METHOD = 'AES-256-CBC';
const SECRET_KEY = '$DP_@2020';
const SECRET_IV = '10172';
const SISTEMA_PRUEBA = 'SI';  // SI o NO
