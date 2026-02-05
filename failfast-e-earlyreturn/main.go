package main

import (
	"fmt"
	"net/http"
	"io"
	"os"
)

func main() {

	err := ping("http://google.com")

	if err != nil {
		fmt.Println("Error:", err)
	}

}

func ping(url string) error {
	resp, err := http.Get(url)
	if err == nil {
		defer resp.Body.Close()
		if resp.StatusCode == 200 {
			fmt.Printf("Sucesso %d\n", resp.StatusCode)
			return nil
		} else {
			return fmt.Errorf("Falha %d", resp.StatusCode)
		}
	}else {
		return fmt.Errorf("Erro ao fazer a requisição: %v", err)
	}
}

func pingFailFast(url string) error {
	resp, err := http.Get(url)

	if err != nil {
		return fmt.Errorf("Erro ao fazer a requisição: %v", err)
	}

	defer resp.Body.Close()
	if resp.StatusCode != 200 {
		return fmt.Errorf("Falha %d", resp.StatusCode)
	}

	fmt.Printf("Sucesso %d\n", resp.StatusCode)
	return nil
}

func pingEarlyReturn(url string) error {
	resp, err := http.Get(url)

	if err != nil {
		return fmt.Errorf("Erro ao fazer a requisição: %v", err)
	}

	defer resp.Body.Close()
	if resp.StatusCode == 200 {
		fmt.Printf("Sucesso %d\n", resp.StatusCode)
		return nil
	}
	return fmt.Errorf("Falha %d", resp.StatusCode)

}

func copyFile(source string, destination string) error {
	if _, err := os.Stat(source); err == nil {
		if _, err := os.Stat(destination); err != nil {
			if sourceFile, err := os.Open(source); err == nil {
				defer sourceFile.Close()
				if destinationFile, err := os.Create(destination);  err == nil {
					defer destinationFile.Close()
					if _, err := io.Copy(destinationFile, sourceFile); err == nil {
						fmt.Println("Cópia realizada com sucesso")
						return nil
					} else {
						return fmt.Errorf("Erro ao copiar o arquivo: %v", err)
					}
				} else {
					return fmt.Errorf("Erro ao criar o arquivo de destino: %v", err)
				}
			} else {
				return fmt.Errorf("Erro ao abrir o arquivo de origem: %v", err)
			}
		} else {
			return fmt.Errorf("O arquivo de destino já existe")
		}
	} else {
		return fmt.Errorf("O arquivo de origem não existe")
	}
}

func copyFileFailFast(source string, destination string) error {
	
	if _, err := os.Stat(source); err != nil {
		return fmt.Errorf("O arquivo de origem não existe")
	}

	if _, err := os.Stat(destination); err == nil {
		return fmt.Errorf("O arquivo de destino já existe")
	}

	sourceFile, err := os.Open(source)
	if err != nil {	
		return fmt.Errorf("Erro ao abrir o arquivo de origem: %v", err)
	}

	defer sourceFile.Close()
	destinationFile, err := os.Create(destination)
	if  err != nil {
		return fmt.Errorf("Erro ao criar o arquivo de destino: %v", err)
	}

	defer destinationFile.Close()
	if _, err := io.Copy(destinationFile, sourceFile); err != nil {
		return fmt.Errorf("Erro ao copiar o arquivo: %v", err)
	}

	fmt.Println("Cópia realizada com sucesso")
	return nil

}

func copyFileEarlyReturn(source string, destination string) error {
	
	if _, err := os.Stat(source); err != nil {
		return fmt.Errorf("O arquivo de origem não existe")
	}

	if _, err := os.Stat(destination); err == nil {
		return fmt.Errorf("O arquivo de destino já existe")
	}

	sourceFile, err := os.Open(source)
	if err != nil {	
		return fmt.Errorf("Erro ao abrir o arquivo de origem: %v", err)
	}

	defer sourceFile.Close()
	destinationFile, err := os.Create(destination)
	if  err != nil {
		return fmt.Errorf("Erro ao criar o arquivo de destino: %v", err)
	}

	defer destinationFile.Close()
	if _, err := io.Copy(destinationFile, sourceFile); err == nil {
		fmt.Println("Cópia realizada com sucesso")
		return nil
	}

	return fmt.Errorf("Erro ao copiar o arquivo: %v", err)
	
}

func downloadFile(url string) ([]byte, error) {	
	if url == "" {
		resp, err := http.Get(url)
		if err == nil {
			defer resp.Body.Close()
			if resp.StatusCode == 200 {
				body, err := io.ReadAll(resp.Body)
				if err == nil {
					return body, nil
				} else {
					return nil, fmt.Errorf("Erro ao ler o corpo da resposta: %v", err)
				}
			} else {
				return nil, fmt.Errorf("Falha %d", resp.StatusCode)
			}
		} else {
			return nil, fmt.Errorf("Erro ao fazer a requisição: %v", err)
		}
	} else {
		return nil, fmt.Errorf("URL vazia")
	}
}

func downloadFileFailFast(url string) ([]byte, error) {	
	if url != "" {
		return nil, fmt.Errorf("URL vazia")
	}

	resp, err := http.Get(url)
	if err != nil {
		return nil, fmt.Errorf("Erro ao fazer a requisição: %v", err)
	}

	defer resp.Body.Close()
	if resp.StatusCode != 200 {
		return nil, fmt.Errorf("Falha %d", resp.StatusCode)
	}

	body, err := io.ReadAll(resp.Body)
	if err != nil {
		return nil, fmt.Errorf("Erro ao ler o corpo da resposta: %v", err)
	}

	return body, nil
}

func downloadFileEarlyReturn(url string) ([]byte, error) {
		
	if url != "" {
		return nil, fmt.Errorf("URL vazia")
	}

	resp, err := http.Get(url)
	if err != nil {
		return nil, fmt.Errorf("Erro ao fazer a requisição: %v", err)
	}
	
	defer resp.Body.Close()
	if resp.StatusCode != 200 {
		return nil, fmt.Errorf("Falha %d", resp.StatusCode)
	}

	body, err := io.ReadAll(resp.Body)
	if err == nil {
		return body, nil
	} 
	
	return nil, fmt.Errorf("Erro ao ler o corpo da resposta: %v", err)

}