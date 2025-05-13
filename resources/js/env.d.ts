// resources/js/env.d.ts

import type { PageProps as BasePageProps } from '@inertiajs/core';

declare module '@inertiajs/core' {
    interface PageProps extends BasePageProps {
        auth: {
            user:
                | {
                id: number;
                name: string;
                email: string;
                roles: string[];
            }
                | null;
        };
    }
}
