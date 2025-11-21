// public/js/webgl/Media.js
import { Plane, Texture } from 'ogl';

export default class Media {
    constructor(gl, { image, text }) {
        this.gl = gl;
        this.image = image;
        this.text = text;

        this.createTexture();
        this.createMesh();
    }

    createTexture() {
        const img = new Image();
        img.src = this.image;

        this.texture = new Texture(this.gl);

        img.onload = () => {
            this.texture.image = img;
        };
    }

    createMesh() {
        this.geometry = new Plane(this.gl, {
            width: 1.8,
            height: 1.2
        });

        this.program = new Program(this.gl, {
            vertex: `
                attribute vec2 uv;
                attribute vec3 position;
                varying vec2 vUv;
                void main() {
                    vUv = uv;
                    gl_Position = vec4(position, 1.0);
                }
            `,
            fragment: `
                precision highp float;
                varying vec2 vUv;
                uniform sampler2D tMap;
                void main() {
                    gl_FragColor = texture2D(tMap, vUv);
                }
            `,
            uniforms: {
                tMap: { value: this.texture }
            }
        });

        this.mesh = new Mesh(this.gl, {
            geometry: this.geometry,
            program: this.program
        });

        this.mesh.position.z = 0;
    }
}
