<?php
// URL do XML
$xmlUrl = 'https://www.yopp.com.br/xml/xml.php?Chave==A3boNXZsd2bvdGf2IDO4cDO';

// Carrega o XML
$xmlString = file_get_contents($xmlUrl);
if (!$xmlString) {
    die('❌ Falha ao obter XML');
}

// Converte XML em objeto
$xml = simplexml_load_string($xmlString);
if (!$xml) {
    die('❌ XML inválido');
}

// Define namespaces
$namespaces = $xml->getNamespaces(true);

// Inicia array final
$produtos = [];

// Itera sobre os <item>
foreach ($xml->channel->item as $item) {
    $g = $item->children($namespaces['g']);

    $produtos[] = [
        'nome'      => trim((string) $item->title),
        'preco'     => isset($g->price) ? trim((string) $g->price) : '',
        'categoria' => isset($g->product_type) ? trim((string) $g->product_type) : '',
        'imagem'    => isset($g->image_link) ? trim((string) $g->image_link) : '',
        'url'       => trim((string) $item->link),
    ];
}

// Salva como JSON
$json = json_encode($produtos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
file_put_contents('produtos.json', $json);

echo "✅ JSON gerado com sucesso com " . count($produtos) . " produtos.\n";
?>
