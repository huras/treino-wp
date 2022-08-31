function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
}
function setCookie(cname, cvalue, exdays = 3) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
const tipoVeiculo = (idVeiculo) => {
    if(idVeiculo == 1) {
        return 'carro';
    }
    else if(idVeiculo == 2) {
        return 'moto';
    }
    else if(idVeiculo == 3) {
        return 'caminhao';
    }
}

var params = {
    codigoTipoVeiculo: getCookie('codigoTipoVeiculo') ,
    codigoTabelaReferencia: getCookie('codigoTabelaReferencia') ,
    codigoModelo: getCookie('codigoModelo'),
    codigoMarca: getCookie('codigoMarca') ,
    ano: getCookie('ano'),
    codigoTipoCombustivel: getCookie('codigoTipoCombustivel'),
    anoModelo: getCookie('anoModelo'),
    modeloCodigoExterno: getCookie('modeloCodigoExterno'),
    tipoConsulta: 'tradicional'
}
console.log('params', params)

const ConsultarMarcas = (callback = () => {}) => {
    const data = new URLSearchParams();
    Object.keys(params).forEach(key => data.append(key, params[key]));

    fetch('https://veiculos.fipe.org.br/api/veiculos//ConsultarMarcas', {
        method: 'post',
        body: data,
    })
    .then((response) => {
        var contentType = response.headers.get("content-type");
        if(contentType && contentType.indexOf("application/json") !== -1) {
            return response.json().then(function(json) {
                // process your JSON further
                // console.log(json);
                callback(json);
            });
        } else {
            console.log("Oops, we haven't got JSON!");
        }
    });
}

const ConsultarModelos = (callback = () => {}) => {
    const data = new URLSearchParams();
    Object.keys(params).forEach(key => data.append(key, params[key]));

    fetch('https://veiculos.fipe.org.br/api/veiculos//ConsultarModelos', {
        method: 'post',
        body: data,
    })
    .then((response) => {
        var contentType = response.headers.get("content-type");
        if(contentType && contentType.indexOf("application/json") !== -1) {
            return response.json().then(function(json) {
                // process your JSON further
                // console.log(json);
                callback(json);
            });
        } else {
            console.log("Oops, we haven't got JSON!");
        }
    });
}

const ConsultarAnoModelo = (callback = () => {}) => {
    const data = new URLSearchParams();
    Object.keys(params).forEach(key => data.append(key, params[key]));

    fetch('https://veiculos.fipe.org.br/api/veiculos//ConsultarAnoModelo', {
        method: 'post',
        body: data,
    })
    .then((response) => {
        var contentType = response.headers.get("content-type");
        if(contentType && contentType.indexOf("application/json") !== -1) {
            return response.json().then(function(json) {
                // process your JSON further
                // console.log(json);
                callback(json);
            });
        } else {
            console.log("Oops, we haven't got JSON!");
        }
    });
}

var versaoMaisRecente = undefined;
var tabelaDeReferencia = [];
const ConsultarTabelaDeReferencia = (callback = () => {}) => {
    const data = new URLSearchParams();

    fetch('https://veiculos.fipe.org.br/api/veiculos//ConsultarTabelaDeReferencia', {
        method: 'post',
        body: data,
    })
    .then((response) => {
        var contentType = response.headers.get("content-type");
        if(contentType && contentType.indexOf("application/json") !== -1) {
            return response.json().then(function(json) {
                // process your JSON further

                tabelaDeReferencia = json;
                callback(tabelaDeReferencia);
                // cookies_list = [];
                // for(var item of tabelaDeReferencia) {
                //     if(cookies_list.length == 0)
                //         cookies_list.push([]);

                //     if(cookies_list[cookies_list.length - 1].length > 10) {
                //         cookies_list.push([]);
                //     }

                //     cookies_list[cookies_list.length - 1].push(item);
                // }
                // var cookie = JSON.stringify(json)
                //     .replaceAll('Codigo', 'c')
                //     .replaceAll('Mes', 'm')
                //     .replaceAll('janeiro', '1')
                //     .replaceAll('fevereiro', '2')
                //     .replaceAll('março', '3')
                //     .replaceAll('abril', '4')
                //     .replaceAll('maio', '5')
                //     .replaceAll('junho', '6')
                //     .replaceAll('julho', '7')
                //     .replaceAll('agosto', '8')
                //     .replaceAll('setembro', '9')
                //     .replaceAll('outubro', 'a')
                //     .replaceAll('novembro', 'b')
                //     .replaceAll('dezembro', 'c')

                // var i = 0;
                // for(var cookies of cookies_list){
                //     setCookie(`ConsultarTabelaDeReferencia${i == 0 ? '' : i}`, JSON.stringify(cookies));
                //     i++;
                // }
            });
        } else {
            console.log("Oops, we haven't got JSON!");
        }
    });
}

const ConsultarModelosAtravesDoAno = (callback = () => {}) => {
    const data = new URLSearchParams();
    Object.keys(params).forEach(key => data.append(key, params[key]));

    fetch('https://veiculos.fipe.org.br/api/veiculos//ConsultarModelosAtravesDoAno', {
        method: 'post',
        body: data,
    })
    .then((response) => {
        var contentType = response.headers.get("content-type");
        if(contentType && contentType.indexOf("application/json") !== -1) {
            return response.json().then(function(json) {
                // process your JSON further
                // console.log(json);
                callback(json);
            });
        } else {
            console.log("Oops, we haven't got JSON!");
        }
    });
}
const ConsultarValorComTodosParametros = (callback = () => {}) => {
    ConsultarModelosAtravesDoAno((res) => {
        const data = new URLSearchParams();
        Object.keys(params).forEach(key => data.append(key, params[key]));

        fetch('https://veiculos.fipe.org.br/api/veiculos//ConsultarValorComTodosParametros', {
            method: 'post',
            body: data,
        })
        .then((response) => {
            var contentType = response.headers.get("content-type");
            if(contentType && contentType.indexOf("application/json") !== -1) {
                return response.json().then(function(json) {
                    // process your JSON further
                    // console.log(json);
                    callback(json);
                });
            } else {
                console.log("Oops, we haven't got JSON!");
            }
        });
    });
}

// ==============================================================

// Puxa a tabela de referencia para usar a mais atual
function startFIPEIntegration () {
    ConsultarTabelaDeReferencia((tabelaDeReferencia) => {
        var maisRecente = Number.MIN_VALUE;
        for(var item of tabelaDeReferencia){
            if(maisRecente < item.Codigo){
                maisRecente = item.Codigo;
            }
        }

        versaoMaisRecente = maisRecente;

        document.getElementById('codigoTabela').value = versaoMaisRecente;
        params.codigoTabelaReferencia = versaoMaisRecente;
    });
}
startFIPEIntegration();

const handleVehicleType = (event) => {
    const valor = event.target.value;
    if(!valor) {
        return;
    }
    params.codigoTipoVeiculo = valor;
    ConsultarMarcas((marcas) => {
        const selectMarca = document.querySelector('#select-marca');
        for(var oldOption of selectMarca.querySelectorAll('option')) {
            oldOption.parentElement.removeChild(oldOption);
        }

        const selectModelo = document.querySelector('#select-modelo');
        for(var oldOption of selectModelo.querySelectorAll('option')) {
            oldOption.parentElement.removeChild(oldOption);
        }

        const selectAnoModelo = document.querySelector('#select-ano-modelo');
        for(var oldOption of selectAnoModelo.querySelectorAll('option')) {
            oldOption.parentElement.removeChild(oldOption);
        }

        selectMarca.add(new Option('',''), undefined); //Empty option

        marcas.map(marca => {
            let newOption = new Option(marca.Label,marca.Value);
            selectMarca.add(newOption,undefined);
        })
    });
}

const handleBrand = (event) => {
    const valor = event.target.value;
    if(!valor) {
        return;
    }
    params.codigoMarca = valor;
    ConsultarModelos((modelos) => {
        const selectModelo = document.querySelector('#select-modelo');
        for(var oldOption of selectModelo.querySelectorAll('option')) {
            oldOption.parentElement.removeChild(oldOption);
        }

        selectModelo.add(new Option('',''), undefined); //Empty option
        modelos.Modelos.map(modelo => {
            let newOption = new Option(modelo.Label,modelo.Value);
            selectModelo.add(newOption,undefined);
        })

        $("#select-ano-modelo").empty();
    });
}

const handleModel = (event) => {
    const valor = event.target.value;
    if(!valor) {
        return;
    }
    params.codigoModelo = valor;
    ConsultarAnoModelo((anoModelos) => {
        const selectAnoModelo = document.querySelector('#select-ano-modelo');
        for(var oldOption of selectAnoModelo.querySelectorAll('option')) {
            oldOption.parentElement.removeChild(oldOption);
        }

        selectAnoModelo.add(new Option('',''), undefined); //Empty option
        anoModelos.map(anoModelo => {
            let newOption = new Option(
                anoModelo.Label == '32000' ? 'Zero KM' : anoModelo.Label,
                anoModelo.Value
            );
            selectAnoModelo.add(newOption,undefined);
        })
    });
}

const handleYear = (event) => {
    const valor = event.target.value;
    if(!valor) {
        return;
    }
    params.codigoAnoModelo = valor;
    params.anoModelo = valor.split('-')[0];
    params.codigoTipoCombustivel = valor.split('-')[1];
    params.tipoVeiculo = tipoVeiculo(params.codigoTipoVeiculo);

    getVehicleData();
}

const getVehicleData = () => {
    document.getElementById('paramsJSON').value = JSON.stringify(params);
    ConsultarValorComTodosParametros((res) => {
        console.log(res);
    })
}
