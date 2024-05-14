import { Router } from "express";
import { BannerController } from "./BannerController.js";

export class RouterBanner{
    static get routes(){
        /**instancia de router */
        const router = Router();
        /**Instancia de controlador */
        const controller = new BannerController()
        /**Path de ejecucion de controlador */
        router.get('/index',controller.indexBanner);
        router.get('/create',controller.createBanner);
        router.get('/delete',controller.deleteBanner);
        router.get('/find',controller.findBanner);

        /** Retorno de todo el router */
        return router;
    }
}