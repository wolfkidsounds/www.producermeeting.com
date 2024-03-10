import { Controller } from '@hotwired/stimulus';
import '../scripts/js/app/blurry-load/blurry-load.css';
import BlurryImageLoad from '../scripts/js/app/blurry-load/blurry-load';

const blurryImageLoad = new BlurryImageLoad();
export default class extends Controller {
    initialize() {
        blurryImageLoad.load();
    }
}
