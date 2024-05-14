export class BannerController {
    
    constructor(){}

  indexBanner(req, res) {
    res.json([
      {
        "succes": "retorno del vanner activo",
      },
    ]);
  }
  createBanner(req, res) {
    res.json([
      {
        "succes": "Banner registrado con exito",
      },
    ]);
  }
  deleteBanner(req, res) {
    res.json([
      {
        "succes": "Banner eliminado con exito",
      },
    ]);
  }
  findBanner(req, res) {
    res.json([
      {
        "succes": "retorno de un banner",
      },
    ]);
  }
}
