public class VersaoRuimSemFailFast {

    public static void main(String[] args) {

        System.out.println(calcularDesconto(200, true));
        System.out.println(formatarNome("Lucas"));
        System.out.println(processarPagamento(1500, "CARTAO"));

    }

    // FUNÇÃO 1 - versão ruim
    public static double calcularDesconto(double valorCompra, boolean clienteVip) {

        double desconto = 0;

        if (valorCompra > 0) {

            if (clienteVip) {
                desconto = valorCompra * 0.10;
            } else {
                desconto = valorCompra * 0.05;
            }

        } else {
            System.out.println("Valor inválido");
        }

        return desconto;
    }

    public static double calcularDescontoFailFast(double valorCompra, boolean clienteVip) {
        if (valorCompra < 0) {
            System.out.println("Valor inválido");
            return 0;
        }

        if (!clienteVip) {
            return valorCompra * 0.05;
        }
        
        return valorCompra * 0.10;
    }

    // FUNÇÃO 2 - versão ruim
    public static String formatarNome(String nome) {

        String resultado = "";

        if (nome != null) {

            nome = nome.trim();

            if (!nome.isEmpty()) {

                if (nome.length() >= 3) {

                    String primeira = nome.substring(0, 1).toUpperCase();
                    String resto = nome.substring(1).toLowerCase();
                    resultado = primeira + resto;

                } else {
                    resultado = "Nome muito curto";
                }

            } else {
                resultado = "Nome vazio";
            }

        } else {
            resultado = "Nome não informado";
        }

        return resultado;
    }

    public static String formatarNomeEarlyReturn(String nome) {

        if (nome == null) {
            return "Nome não informado";
        } 

        nome = nome.trim();
        if (nome.isEmpty()) {
            return "Nome vazio";
        } 

        if (nome.length() < 3) {
            return "Nome muito curto";
        }

        String primeira = nome.substring(0, 1).toUpperCase();
        String resto = nome.substring(1).toLowerCase();
        
        return primeira + resto;

    }

    // FUNÇÃO 3 - versão ruim
    public static String processarPagamento(double valor, String metodoPagamento) {

        String resposta = "";

        if (valor > 0) {

            if (metodoPagamento != null) {

                if (metodoPagamento.equalsIgnoreCase("PIX")) {

                    resposta = "Pagamento aprovado via PIX";

                } else {

                    if (metodoPagamento.equalsIgnoreCase("CARTAO")) {

                        if (valor > 1000) {
                            resposta = "Cartão requer autorização extra";
                        } else {
                            resposta = "Pagamento aprovado no cartão";
                        }

                    } else {
                        resposta = "Método de pagamento não suportado";
                    }
                }

            } else {
                resposta = "Método não informado";
            }

        } else {
            resposta = "Valor inválido";
        }

        return resposta;
    }

    public static String processarPagamentoEarlyReturn(double valor, String metodoPagamento) {

        if (valor <= 0) {
            return "Valor inválido";
        }

        if (metodoPagamento == null) {
            return "Método não informado";
        }

        boolean isPix = metodoPagamento.equalsIgnoreCase("PIX");
        
        if (!isPix) {

            boolean isCartao = metodoPagamento.equalsIgnoreCase("CARTAO");
            if (!isCartao) {
                return "Método de pagamento não suportado";
            }

            if (valor <= 1000) {
            return "Pagamento aprovado no cartão";
            }

            return "Cartão requer autorização extra";

        }
        return "Pagamento aprovado via PIX";
    }

    public static String processarPagamentoFailFast(double valor, String metodoPagamento) {

        if (valor <= 0) {
            return "Valor inválido";
        }

        if (metodoPagamento == null) {
            return "Método não informado";
        }

        boolean isCartao = metodoPagamento.equalsIgnoreCase("CARTAO");
        boolean isPix = metodoPagamento.equalsIgnoreCase("PIX");
        if (!isPix && !isCartao) {
            return "Método de pagamento não suportado";
        }

        if (!isPix && valor <= 1000) {
            return "Pagamento aprovado no cartão";
        }

        if(!isPix){
            return "Cartão requer autorização extra";
        }

        return "Pagamento aprovado via PIX";
    }

}
