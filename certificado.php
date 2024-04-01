<?php
require_once('TCPDF-main/tcpdf.php');
include_once('conecta.php');

// Função para gerar o certificado em PDF
function gerarCertificadoPDF($resultados) {
    // Definindo uma classe personalizada que estende TCPDF para definir a imagem de fundo
    class MYPDF extends TCPDF {
        //Page header
        public function Header() {
            // get the current page break margin
            $bMargin = $this->getBreakMargin();
            // get current auto-page-break mode
            $auto_page_break = $this->AutoPageBreak;
            // disable auto-page-break
            $this->SetAutoPageBreak(false, 0);
            // set bacground image
            $img_file = '11.jpg';
            $this->Image($img_file, 0, 0, 297, 210, '', '', '', false, 300, '', false, false, 0);
            // restore auto-page-break status
            $this->SetAutoPageBreak($auto_page_break, $bMargin);
            // set the starting point for the page content
            $this->setPageMark();
        }
    }
    
    // Defina o tamanho da página como A4 paisagem
    $pdf = new MYPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
    

    // Defina as margens
    $pdf->SetMargins(10, 10,10);

    // Defina as informações do documento
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Nome do Autor');
    $pdf->SetTitle('Certificado');
    $pdf->SetSubject('Certificado de Conclusão');
    $pdf->SetKeywords('Certificado, Conclusão, Aluno');

    // Iterar sobre os resultados
    foreach ($resultados as $resultado) {
        // Adicione uma página em branco
        $pdf->AddPage();

        // Construa o certificado PDF
        $html = "
        <body>
        <div>
        <h1>Certificado</h1>
        <p><strong>Título:</strong> {$resultado['titulo']}</p>
        <p><strong>Gênero:</strong> {$resultado['genero']}</p>
        <p><strong>Descrição:</strong> {$resultado['descricao']}</p>
        <p><strong>Data de Conclusão:</strong> " . date('d/m/Y') . "</p>
        </div>
        </body>
        <!-- Você pode adicionar mais informações aqui, como data de conclusão, etc. -->
        ";

        // Adicione o HTML ao PDF
        $pdf->writeHTML($html, true, false, true, false, '');
    }

    // Saída do PDF
    $pdf->Output('certificado.pdf', 'I');
}

// Verifica se há resultados
if(isset($_SESSION['resultado'])) {
    // Chamada para gerar o certificado em PDF com base nos resultados
    gerarCertificadoPDF($_SESSION['resultado']);
} else {
    echo "Nenhum resultado encontrado.";
}
?>
