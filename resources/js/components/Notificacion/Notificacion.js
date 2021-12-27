import React from 'react';
import { Alert } from 'react-bootstrap';
export default function Notificacion(props){
    return ([
        'primera',
        'secondary',
        'success',
        'danger',
        'warning',
        'informacion',
        'light',
        'dark',
      ].map((variant, idx) => (
        <Alert key={idx} variant={variant}>
          Esta es una {variant} alerta!
        </Alert>
      ))
      );
}