import React from 'react';
import Tarjeta from '../Tarjeta';
import Lista from '../Carreras/Lista';
import Formulario from '../Formulario';

export default function Carreras(props){
    return (
        <Tarjeta titulo="Carreras">
            <Formulario />
            <Lista />
            
        </Tarjeta>
    );
}