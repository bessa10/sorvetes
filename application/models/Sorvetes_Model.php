<?

class Sorvetes_Model extends CI_Model
{
	public function findFabricantes()
	{
		$fabricantes = $this->db->get('fabricantes')->result();

		return $fabricantes;

	}

	public function insert_fabricante($dadosFabricante = NULL)
	{
		if($dadosFabricante != NULL) {

			$this->db->insert('fabricantes', $dadosFabricante);

			return true;			

		} else {

			return false;

		}
	}

	public function insert_sabor($dadosSabor=NULL)
	{
		if($dadosSabor != NULL) {

			$this->db->insert('sabores', $dadosSabor);

			return true;

		} else {

			return false;
		}
	}

	public function findSorvetes()
	{	
		$this->db
			->select('sabores.id')
			->select('fabricantes.nome')
			->select('fabricantes.cnpj')
			->select('sabores.sabor')
			->select('sabores.preco_sugerido')
			->join('fabricantes', 'fabricantes.id = sabores.fabricante_id');

		$sorvetes = $this->db->get('sabores')->result();

		return $sorvetes;
	}

}