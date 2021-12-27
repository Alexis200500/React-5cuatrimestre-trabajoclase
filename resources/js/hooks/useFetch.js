import {useState, useEffect} from 'react';

export default function useFetch(url, options, token, method = 'GET') {
    const authorization = `Bearer ${token}`;// 'Bearer ' + token
    const ops = {
        method: method
        , credentials: 'include'
        , mode: 'cors'
        , headers: new Headers({
            'Authorization': authorization
            , 'Accept': 'application/json'
            , 'Access-Control-Allow-Credentials':true
            , 'Access-Control-Request-Method': method
            , 'Access-Control-Request-Headers':'Authorization'
        })
    };
    const fullOptions = {...options, ...ops};

    const [loading, setLoading] = useState(true);// return [true, (valor) => {this.loading = valor;}]
    const [result, setResult] = useState(null);
    const [error, setError] = useState(null);

    useEffect(() => {
        (async () => {
            try {
                const res = await fetch(url, fullOptions);
                const json = await res.json();
                setLoading(false);
                setResult(json);
            } catch(err) {
                setLoading(false);
                setError(err);
            }
        })()
    }, [url, options]);//poner [] si sólo debe ejecutarse en: https://www.digitalocean.com/community/tutorials/getting-started-with-react-hooks
    return {loading, result, error};
}