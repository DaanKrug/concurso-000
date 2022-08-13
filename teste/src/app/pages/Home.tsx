import axios from "axios";
import React, { useEffect, useState } from "react";
import { cpf } from "cpf-cnpj-validator";
import { toast, ToastContainer } from "react-toastify";

interface ICitys {
  id: number;
  nome: string;
}
interface IStates {
  id: number;
  sigla: string;
}
interface IPessoaFisica {
  cpf: string;
}

function Home() {
  // variáveis de estado que armazenam os dados das chamadas api
  const [citys, setCitys] = useState<ICitys[]>([]);
  const [states, setStates] = useState<IStates[]>([]);
  const [pessoaFisica, setPessoaFisica] = useState<IPessoaFisica[]>([]);

  // variáveis de estado que armazenam os dados escritos nos inputs
  const [fullName, setFullName] = useState<string>();
  const [endereco, setEndereco] = useState<string>();
  const [cargo, setCargo] = useState<string>();
  const [currentCpf, setCurrentCpf] = useState<string>();
  const [estado, setEstado] = useState<string>();
  const [cidade, setCidade] = useState<string>();

  const validateCpf = cpf.isValid(currentCpf as string);
  const maskCpf = cpf.format(currentCpf as string);
  // função que faz a chamada a api de acordo com a uf que eu selecionar
  const getCitys = async (uf: string) => {
    const estados = await axios
      .get(
        `https://servicodados.ibge.gov.br/api/v1/localidades/estados/${uf}/municipios`
      )
      .then((response) => setCitys(response.data));
    return estados;
  };

  // função que pega os valores dos inputs e selects e armazena no estado
  const getInputValue = (
    event: React.FormEvent,
    setState: React.Dispatch<React.SetStateAction<string | undefined>>,
    checkFullname?: boolean,
  ) => {
    const newValue = (event.target as HTMLInputElement).value;
    setState(newValue)
    if( checkFullname) {
      // Colocar Primeira letra maíscula
      const palavras = newValue.split(" ");
      for (let i = 0; i < palavras.length; i++) {
        palavras[i] = palavras[i][0].toUpperCase() + palavras[i].substring(1);
      }
      const string = palavras.join(" ");
      setState(string)
    }
  };

  const getALlPessoaFisica = async () => {
    await axios
      .get("http://localhost/api/concurso/pessoa_fisica")
      .then((response) => setPessoaFisica(response.data.dados));
  };
  // função para inserir os dados do formulario no banco de dados
  const handleSubmit = async (event: React.FormEvent) => {
    event.preventDefault();
    try {
      getALlPessoaFisica();

      const checkIfIsSubscribed = pessoaFisica.find(
        (item) => item.cpf === currentCpf
      );
      if (!checkIfIsSubscribed?.cpf) {
        if (fullName && validateCpf && endereco && cidade && estado) {
          {
            await axios.post("http://localhost/api/concurso/adiciona", {
              nome: fullName,
              cpf: currentCpf,
              endereco: endereco,
              cidade_id: cidade,
              estado_id: estado,
            });
            toast.success(`${fullName} Cadastrado com sucesso!`, {
              position: "top-right",
              autoClose: 5000,
              hideProgressBar: false,
              closeOnClick: true,
              pauseOnHover: true,
              draggable: true,
              progress: undefined,
            });
          }
        } else {
          toast.error("Deu ruim!", {
            position: "top-right",
            autoClose: 5000,
            hideProgressBar: false,
            closeOnClick: true,
            pauseOnHover: true,
            draggable: true,
            progress: undefined,
          });
        }
      } else {
        toast.warn(`${fullName} Usuário ja inscrito`, {
          position: "top-right",
          autoClose: 5000,
          hideProgressBar: false,
          closeOnClick: true,
          pauseOnHover: true,
          draggable: true,
          progress: undefined,
          });
      }
    } catch (error) {
      console.log(error);
    }
  };

  // useEffect renderiza toda vez que carregar a tela, faz a chamada pra pegar os estados
  // e armazenar na variável de estado
  useEffect(() => {
    axios
      .get("https://servicodados.ibge.gov.br/api/v1/localidades/estados/")
      .then((response) => setStates(response.data));
  }, []);

  return (
    <>
      <div className="mt-[50px] w-full m-auto flex flex-col items-center justify-center">
        <div className="flex flex-col justify-center items-center gap-3 mb-6">
          <p className="text-2xl text-purple-600 font-bold">
            Concurso Público para Desenvolvedor de Software
          </p>

          <p className="text-lg font-bold">Inscrição de Candidato</p>
        </div>

        <div className="p-1 w-[80%]">
          <form onSubmit={handleSubmit}>
            <div className="border-y-[1px] border-gray-300 py-4">
              <div className="flex gap-5 w-full justify-between">
                <div className="w-1/2 flex flex-col gap-3">
                  <div className="w-full flex flex-col gap-1">
                    <h3>* Nome Completo</h3>
                    <input
                      value={fullName}
                      required
                      onChange={(event) => getInputValue(event, setFullName, true)}
                      className="w-full h-8 px-2 rounded-lg"
                      type="text"
                      pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$"
                    />
                    <h3>* Endereço</h3>
                    <input
                      required
                      onChange={(event) => getInputValue(event, setEndereco)}
                      className="w-full h-8 px-2 rounded-lg"
                      type="text"
                    />

                    <h3>* Cargo</h3>
                    <input
                      onChange={(event) => getInputValue(event, setCargo)}
                      className="w-full h-8 px-2 rounded-lg"
                      type="text"
                    />
                  </div>
                </div>

                <div className="flex flex-col w-1/2 gap-3">
                  <div className="w-full flex flex-col gap-1">
                    <h3>* CPF</h3>
                    <input
                      value={maskCpf}
                      maxLength={14}
                      required
                      onChange={(event) => getInputValue(event, setCurrentCpf)}
                      className="w-full h-8 px-2 rounded-lg"
                      type="text"
                    />

                    <div className="flex gap-3 justify-between">
                      <div className="w-[30%] flex flex-col gap-1">
                        <h3>* Estado</h3>
                        <select
                          required
                          onChange={(event) => {
                            getInputValue(event, setEstado);
                          }}
                          onClick={() => getCitys(estado as string)}
                          id="cidade"
                          className="w-full h-8 px-2 rounded-lg"
                        >
                          <option value={undefined}>Selecione</option>
                          {states?.map((state) => (
                            <option
                              key={state.sigla}
                              value={state.sigla}
                              id="estado"
                            >
                              {state.sigla}
                            </option>
                          ))}
                        </select>
                      </div>

                      <div className="w-[70%] flex flex-col gap-1">
                        <h3>* Cidade</h3>
                        <select
                          required
                          disabled={citys.length ? false : true}
                          onChange={(event) => getInputValue(event, setCidade)}
                          id="cidade"
                          className="w-full h-8 px-2 rounded-lg"
                        >
                          <option>Cidade</option>
                          {citys?.map((city) => (
                            <option key={city.id} value={city.nome} id="estado">
                              {city.nome}
                            </option>
                          ))}
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div className="w-full text-right mt-3">
              <button
                type="submit"
                className="h-12 bg-green-500 text-white p-2 
            text-xl rounded-md
            "
              >
                Salvar Inscrição
              </button>
            </div>
          </form>
        </div>
      </div>
    </>
  );
}
export { Home };
