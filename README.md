# Cartesorio
Projeto de Cartório Virtual em WORDPRESS para funcionamento com Blockchain Cartesi.

O sistema foi desenvolvido em plataforma WORDPRESS em PHP..

O código não é explicito e as funcionalidades são por programação NO CODE.

Registrsos:
Lista de registro de documentos - Tabela onde é feita o registro dos arquivos registrados no sistema

As funcionalidades são:
Inclusão de 3 tipos de registros na lista - Documento (Ex: DOC, PDF, etc), Música (MP3) e Fake News (URL)

Ao incluir um documento é feito o upload do arquivo e gerado o HASH do mesmo ( via código PHP) e então acessado o endereço http://143.42.3.144:8088/?string=[field id="hash"]. 
No citado endereço a máquina CARTESI irá por médodo GET obter o código de hash enviado e registra-lo no Blockchain com o seguinte código Python:

class RequestHandler(BaseHTTPRequestHandler):
    def do_GET(self):
        query_params = parse_qs(self.path[2:])
        print(self,"teste",self.path,query_params)
        if 'string' in query_params:
            string = query_params['string'][0]
            
           
            print("String recebida:", string)
            sqlcommand=f" insert into hashs (value) values ('{string}')"
            result = subprocess.run(['yarn', 'start', 'input', 'send','--payload', sqlcommand] , capture_output=True, text=True)
            #result = subprocess.run('echo "aa"' , capture_output=True, text=True)
            print("result:", result)
        
        self.send_response(200)
        self.end_headers()

server_address = ('', 8088)
httpd = HTTPServer(server_address, RequestHandler)
print('Servidor iniciado na porta 8088...')
httpd.serve_forever()
